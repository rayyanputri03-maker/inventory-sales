<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kategori') }}
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

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937;">Kategori Produk</h3>
                    <a href="{{ route('categories.create') }}" style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; text-decoration: none;">
                        + Tambah Kategori
                    </a>
                </div>

                <div style="width: 100%; overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1f2937; color: white; text-transform: uppercase; font-size: 0.75rem;">
                                <th style="padding: 0.75rem 1rem; width: 10%;">NO</th>
                                <th style="padding: 0.75rem 1rem; width: 65%;">NAMA KATEGORI</th>
                                <th style="padding: 0.75rem 1rem; width: 25%; text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @forelse($categories as $index => $category)
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #4b5563;">{{ $loop->iteration }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 700; color: #111827;">{{ $category->name }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; text-align: center;">
                                        <a href="{{ route('categories.edit', $category->id) }}" style="color: #2563eb; font-weight: 600; text-decoration: none; margin-right: 0.75rem;">Edit</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="color: #dc2626; font-weight: 600; background: none; border: none; cursor: pointer;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" style="padding: 1rem; text-align: center; font-size: 0.875rem; color: #6b7280;">Belum ada data kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>