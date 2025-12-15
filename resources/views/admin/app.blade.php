<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat datang, Admin! Pilih menu di bawah untuk mengelola sistem.") }}
                    
                    {{-- Navigasi Cepat --}}
                    <div class="mt-4 flex space-x-4">
                        <a href="{{ route('admin.categories.index') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Kelola Kategori
                        </a>
                        <a href="{{ route('admin.products.index') }}" 
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Kelola Produk
                        </a>
                        {{-- Tambahkan link lain (Orders, Users, dll.) di sini --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>