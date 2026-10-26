<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Transaksi Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-6" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 class="text-lg font-bold text-gray-800" style="font-size: 1.125rem; font-weight: 700;">Riwayat Transaksi</h3>
                    <a href="{{ route('sales.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold text-xs rounded-md uppercase hover:bg-blue-700 transition" style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; text-decoration: none;">
                        + Transaksi Baru
                    </a>
                </div>

                <div class="overflow-x-auto" style="width: 100%; overflow-x: auto;">
                    <table style="width: 100%; min-width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1f2937; color: white; text-transform: uppercase; font-size: 0.75rem;">
                                <th style="padding: 0.75rem 1rem; width: 5%;">No</th>
                                <th style="padding: 0.75rem 1rem; width: 25%;">No Invoice</th>
                                <th style="padding: 0.75rem 1rem; width: 25%;">Tanggal</th>
                                <th style="padding: 0.75rem 1rem; width: 25%;">Total Transaksi</th>
                                <th style="padding: 0.75rem 1rem; width: 20%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @forelse($sales as $index => $sale)
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #4b5563;">{{ $loop->iteration }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 700;">
                                        <span style="background-color: #f3f4f6; padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: 1px solid #d1d5db; font-family: monospace; font-size: 0.75rem; color: #1f2937;">
                                            {{ $sale->invoice_number ?? $sale->invoice_no ?? 'INV-'.$sale->id }}
                                        </span>
                                    </td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #4b5563;">{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 600; color: #111827;">
                                        Rp {{ number_format($sale->total_price ?? $sale->total_amount ?? $sale->total ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; text-align: center;">
                                        <a href="{{ route('sales.show', $sale->id) }}" style="background-color: #2563eb; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; font-weight: 600; font-size: 0.75rem; text-decoration: none; display: inline-block;">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="padding: 1rem; text-align: center; font-size: 0.875rem; color: #6b7280;">Belum ada transaksi penjualan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>