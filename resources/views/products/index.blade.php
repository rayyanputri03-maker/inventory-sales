<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('products.create') }}" style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block;">
                        + Tambah Produk
                    </a>
                </div>

                <table class="w-full text-left border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3">No</th>
                            <th class="border p-3">Nama Produk</th>
                            <th class="border p-3">Kategori</th>
                            <th class="border p-3">Supplier</th>
                            <th class="border p-3">Stok</th>
                            <th class="border p-3">Harga</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $product)
                            <tr>
                                <td class="border p-3">{{ $products->firstItem() + $index }}</td>
                                <td class="border p-3">{{ $product->name }}</td>
                                <td class="border p-3">{{ $product->category->name ?? '-' }}</td>
                                <td class="border p-3">{{ $product->supplier->name ?? '-' }}</td>
                                <td class="border p-3">{{ $product->stock }}</td>
                                <td class="border p-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="border p-3">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-600 mr-2">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border p-3 text-center text-gray-500">Belum ada data produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>