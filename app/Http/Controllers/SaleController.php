<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Menampilkan daftar transaksi penjualan.
     */
    public function index()
    {
        $sales = Sale::with('items.product')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    /**
     * Form tambah transaksi baru.
     */
    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('sales.create', compact('products'));
    }

    /**
     * Menyimpan transaksi penjualan beserta item-itemnya.
     */
    public function store(Request $request)
    {
        $request->validate([
            'items'              => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $totalAmount = 0;

            // 1. Buat Header Transaksi
            $sale = Sale::create([
                'user_id'     => auth()->id() ?? 1,
                'sale_number' => 'INV-' . time(),
                'total'       => 0,
                'sold_at'     => now(),
            ]);

            // 2. Loop Setiap Item Produk
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);

                // Cek ketersediaan stok
                if ($product->stock < $item['quantity']) {
                    DB::rollBack();
                    return back()->with('error', "Stok produk {$product->name} tidak mencukupi!");
                }

                $subtotal = $product->price * $item['quantity'];
                $totalAmount += $subtotal;

                // Simpan Detail Transaksi
                SaleItem::create([
                    'sale_id'    => $sale->id,
                    'product_id' => $product->id,
                    'quantity'   => $item['quantity'],
                    'unit_price'      => $product->price,
                    'subtotal'   => $subtotal,
                ]);

                // Potong Stok Produk
                $product->decrement('stock', $item['quantity']);
            }

            // 3. Update Total Belanjaan
            $sale->update(['total' => $totalAmount]);

            DB::commit();
            return redirect()->route('sales.index')->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail transaksi.
     */
    public function show(Sale $sale)
    {
        $sale->load('items.product');
        return view('sales.show', compact('sale'));
    }
}