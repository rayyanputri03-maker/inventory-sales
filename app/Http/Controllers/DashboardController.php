<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Sale;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();
        $totalSales = Sale::count();
        $totalPurchases = Purchase::count();

        // Stok rendah (kurang dari atau sama dengan 5)
        $lowStockProducts = Product::where('stock', '<=', 5)->get();

        // Penjualan terbaru
        $recentSales = Sale::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalSuppliers',
            'totalSales',
            'totalPurchases',
            'lowStockProducts',
            'recentSales'
        ));
    }
}