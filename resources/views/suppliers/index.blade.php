<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Supplier') }}
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
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937;">Pemasok Barang</h3>
                    <a href="{{ route('suppliers.create') }}" style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; text-decoration: none;">
                        + Tambah Supplier
                    </a>
                </div>

                <div style="width: 100%; overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1f2937; color: white; text-transform: uppercase; font-size: 0.75rem;">
                                <th style="padding: 0.75rem 1rem; width: 25%;">NAMA</th>
                                <th style="padding: 0.75rem 1rem; width: 20%;">EMAIL</th>
                                <th style="padding: 0.75rem 1rem; width: 20%;">TELEPON</th>
                                <th style="padding: 0.75rem 1rem; width: 20%;">ALAMAT</th>
                                <th style="padding: 0.75rem 1rem; width: 15%; text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @forelse($suppliers as $supplier)
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 700; color: #111827;">{{ $supplier->name }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #4b5563;">{{ $supplier->email ?? '-' }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #4b5563;">{{ $supplier->phone ?? '-' }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #4b5563;">{{ $supplier->address ?? '-' }}</td>
                                    <td style="padding: 0.75rem 1rem; font-size: 0.875rem; text-align: center;">
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" style="color: #2563eb; font-weight: 600; text-decoration: none; margin-right: 0.75rem;">Edit</a>
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus supplier ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="color: #dc2626; font-weight: 600; background: none; border: none; cursor: pointer;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="padding: 1rem; text-align: center; font-size: 0.875rem; color: #6b7280;">Belum ada data supplier.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>