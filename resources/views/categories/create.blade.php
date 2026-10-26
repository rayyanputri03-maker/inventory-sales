<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <!-- Nama Kategori -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nama Kategori')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-4 mt-4">
                        <x-primary-button>
                            {{ __('Simpan') }}
                        </x-primary-button>

                        <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>