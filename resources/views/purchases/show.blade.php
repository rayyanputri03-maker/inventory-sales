<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Pembelian</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div style="margin-bottom: 1.5rem;">
                    <p><strong>No Transaksi:</strong> {{ $purchase->purchase_number }}</p>
                    <p><strong>Supplier:</strong> {{ $purchase->supplier->name ?? '-' }}</p>
                    <p><strong>Tanggal:</strong> {{ $purchase->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <table style="width: 100%; border-collapse: collapse; text-align: left; margin-bottom: 1.5rem;">
                    <thead>
                        <tr style="background-color: #1f2937; color: white; font-size: 0.75rem;">
                            <th style="padding: 0.5rem 1rem;">Produk</th>
                            <th style="padding: 0.5rem 1rem;">Jumlah</th>
                            <th style="padding: 0.5rem 1rem;">Harga Satuan</th>
                            <th style="padding: 0.5rem 1rem;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchase->items as $item)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="padding: 0.5rem 1rem;">{{ $item->product->name ?? '-' }}</td>
                                <td style="padding: 0.5rem 1rem;">{{ $item->quantity }}</td>
                                <td style="padding: 0.5rem 1rem;">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td style="padding: 0.5rem 1rem;">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('purchases.index') }}" style="background-color: #6b7280; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600;">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>