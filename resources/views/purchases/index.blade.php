<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Pembelian (Purchases)</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937;">Riwayat Pembelian Barang</h3>
                    <a href="{{ route('purchases.create') }}" style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; text-decoration: none;">
                        + Pembelian Baru
                    </a>
                </div>

                <div style="width: 100%; overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1f2937; color: white; text-transform: uppercase; font-size: 0.75rem;">
                                <th style="padding: 0.75rem 1rem;">No</th>
                                <th style="padding: 0.75rem 1rem;">No Transaksi</th>
                                <th style="padding: 0.75rem 1rem;">Supplier</th>
                                <th style="padding: 0.75rem 1rem;">Tanggal</th>
                                <th style="padding: 0.75rem 1rem;">Total</th>
                                <th style="padding: 0.75rem 1rem; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @forelse($purchases as $purchase)
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem;">{{ $loop->iteration }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 700;">{{ $purchase->purchase_number }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem;">{{ $purchase->supplier->name ?? '-' }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem;">{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 600;">Rp {{ number_format($purchase->total_amount, 0, ',', '.') }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; text-align: center;">
                                        <a href="{{ route('purchases.show', $purchase->id) }}" style="background-color: #2563eb; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; font-weight: 600; font-size: 0.75rem; text-decoration: none;">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding: 1rem; text-align: center; font-size: 0.875rem; color: #6b7280;">Belum ada transaksi pembelian.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>