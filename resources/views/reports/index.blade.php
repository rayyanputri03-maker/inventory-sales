<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Filter Form -->
                <form method="GET" action="{{ route('reports.index') }}" class="mb-6 flex flex-wrap gap-4 items-end">
                    <div>
                        <x-input-label for="start_date" :value="__('Dari Tanggal')" />
                        <x-text-input id="start_date" type="date" name="start_date" :value="request('start_date')" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="end_date" :value="__('Sampai Tanggal')" />
                        <x-text-input id="end_date" type="date" name="end_date" :value="request('end_date')" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="search" :value="__('Cari Invoice')" />
                        <x-text-input id="search" type="text" name="search" placeholder="Cari invoice..." :value="request('search')" class="mt-1 block w-full" />
                    </div>

                    <div class="flex gap-2">
                        <x-primary-button type="submit">
                            {{ __('Filter') }}
                        </x-primary-button>

                        <a href="{{ route('reports.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Reset') }}
                        </a>
                    </div>
                </form>

                <!-- Tabel Laporan -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-slate-800">
                            <tr>
                                <th scope="col" class="px-6 py-3">NO</th>
                                <th scope="col" class="px-6 py-3">NO INVOICE</th>
                                <th scope="col" class="px-6 py-3">TANGGAL</th>
                                <th scope="col" class="px-6 py-3">TOTAL TRANSAKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $index => $sale)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $sales->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900">
                                        {{ $sale->sale_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $sale->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        Rp {{ number_format($sale->total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data penjualan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $sales->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>