<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Sale::query();

        // Filter berdasarkan tanggal mulai
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        // Filter berdasarkan tanggal selesai
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter berdasarkan pencarian invoice
        if ($request->filled('search')) {
            $query->where('sale_number', 'like', '%' . $request->search . '%');
        }

        $sales = $query->latest()->paginate(10);

        return view('reports.index', compact('sales'));
    }
}