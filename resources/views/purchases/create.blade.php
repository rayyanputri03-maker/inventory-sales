<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pembelian Barang</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('purchases.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Pilih Supplier</label>
                        <select name="supplier_id" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                            <option value="">-- Pilih Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Pilih Produk</label>
                        <select name="product_id" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                            <option value="">-- Pilih Produk --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} (Stok Sekarang: {{ $product->stock }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Jumlah Beli (Qty)</label>
                        <input type="number" name="quantity" min="1" value="1" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Harga Beli Per Unit (Rp)</label>
                        <input type="number" name="price" min="0" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                    </div>

                    <div style="display: flex; gap: 0.5rem;">
                        <button type="submit" style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; border: none; cursor: pointer;">Simpan Pembelian</button>
                        <a href="{{ route('purchases.index') }}" style="background-color: #6b7280; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600;">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>