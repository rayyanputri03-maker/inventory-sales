<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class= "max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit" style="background-color: #d97706; color: white; padding: 8px 16px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                            Update
                        </button>
                        <a href="{{ route('categories.index') }}" style="background-color: #6b7280; color: white; padding: 8px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block;">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>