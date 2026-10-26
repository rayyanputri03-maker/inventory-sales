<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('supplier')->latest()->paginate(10);
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchases.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $totalAmount = $request->quantity * $request->price;

            $purchase = Purchase::create([
                'purchase_number' => 'PUR-' . time(),
                'supplier_id' => $request->supplier_id,
                'total_amount' => $totalAmount,
            ]);

            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);

            // Tambah stok otomatis
            $product = Product::findOrFail($request->product_id);
            $product->increment('stock', $request->quantity);
        });

        return redirect()->route('purchases.index')->with('success', 'Transaksi Pembelian Berhasil & Stok Bertambah!');
    }

    public function show($id)
    {
        $purchase = Purchase::with(['supplier', 'items.product'])->findOrFail($id);
        return view('purchases.show', compact('purchase'));
    }
}