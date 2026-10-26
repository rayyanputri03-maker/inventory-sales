<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Ringkasan Statistik -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 0.875rem; color: #6b7280; font-weight: 600;">Total Produk</p>
                    <p style="font-size: 1.875rem; font-weight: 700; color: #1f2937;">{{ $totalProducts }}</p>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 0.875rem; color: #6b7280; font-weight: 600;">Total Kategori</p>
                    <p style="font-size: 1.875rem; font-weight: 700; color: #1f2937;">{{ $totalCategories }}</p>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 0.875rem; color: #6b7280; font-weight: 600;">Total Supplier</p>
                    <p style="font-size: 1.875rem; font-weight: 700; color: #1f2937;">{{ $totalSuppliers }}</p>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 0.875rem; color: #6b7280; font-weight: 600;">Total Penjualan</p>
                    <p style="font-size: 1.875rem; font-weight: 700; color: #2563eb;">{{ $totalSales }}</p>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <p style="font-size: 0.875rem; color: #6b7280; font-weight: 600;">Total Pembelian</p>
                    <p style="font-size: 1.875rem; font-weight: 700; color: #059669;">{{ $totalPurchases }}</p>
                </div>
            </div>

            <!-- Tabel Stok Rendah & Penjualan Terbaru -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                
                <!-- Stok Rendah -->
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem; color: #dc2626;">⚠️ Peringatan Stok Rendah (<= 5)</h3>
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="border-bottom: 2px solid #e5e7eb; font-size: 0.75rem; color: #4b5563;">
                                <th style="padding: 0.5rem 0;">PRODUK</th>
                                <th style="padding: 0.5rem 0; text-align: right;">STOK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lowStockProducts as $product)
                                <tr style="border-bottom: 1px solid #f3f4f6; font-size: 0.875rem;">
                                    <td style="padding: 0.5rem 0; font-weight: 600;">{{ $product->name }}</td>
                                    <td style="padding: 0.5rem 0; text-align: right; color: #dc2626; font-weight: 700;">{{ $product->stock }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" style="padding: 1rem 0; text-align: center; color: #6b7280; font-size: 0.875rem;">Semua stok aman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Transaksi Terbaru -->
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem; color: #1f2937;">🛒 Penjualan Terbaru</h3>
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="border-bottom: 2px solid #e5e7eb; font-size: 0.75rem; color: #4b5563;">
                                <th style="padding: 0.5rem 0;">INVOICE</th>
                                <th style="padding: 0.5rem 0; text-align: right;">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentSales as $sale)
                                <tr style="border-bottom: 1px solid #f3f4f6; font-size: 0.875rem;">
                                    <td style="padding: 0.5rem 0; font-weight: 600;">{{ $sale->sale_number }}</td>
                                    <td style="padding: 0.5rem 0; text-align: right; font-weight: 700; color: #059669;">Rp {{ number_format($sale->total, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" style="padding: 1rem 0; text-align: center; color: #6b7280; font-size: 0.875rem;">Belum ada penjualan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>