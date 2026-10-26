<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts   = Product::count();
        $totalCategories = Category::count();
        $totalSuppliers  = Supplier::count();
        $totalStock      = Product::sum('stock');
        $recentSales     = Sale::with('user')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalSuppliers',
            'totalStock',
            'recentSales'
        ));
    }
}