<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Supplier *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $supplier->name) }}" required 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $supplier->email) }}" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $supplier->phone) }}" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea name="address" id="address" rows="3" 
                                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('address', $supplier->address) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-gray-500 text-white text-xs font-semibold rounded-md uppercase hover:bg-gray-600 transition">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-xs font-semibold rounded-md uppercase hover:bg-indigo-700 transition">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>