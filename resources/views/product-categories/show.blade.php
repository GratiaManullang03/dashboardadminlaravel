@extends('layouts.app')

@section('title', 'Detail Kategori Produk - Pazar Admin')

@section('page-title', 'Detail Kategori Produk')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <x-button href="{{ route('product-categories.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
        
        <div class="flex space-x-2">
            <x-button href="{{ route('product-categories.edit', $productCategory->pc_id) }}" variant="primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </x-button>
            
            <form action="{{ route('product-categories.destroy', $productCategory->pc_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                @csrf
                @method('DELETE')
                <x-button type="submit" variant="danger">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Hapus
                </x-button>
            </form>
        </div>
    </div>
    
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="md:col-span-2">
            <x-card title="Informasi Kategori Produk">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</h4>
                        <p>{{ $productCategory->pc_id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Link</h4>
                        @if($productCategory->pc_link)
                            <a href="{{ $productCategory->pc_link }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $productCategory->pc_link }}
                            </a>
                        @else
                            <p class="text-gray-400">-</p>
                        @endif
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul (Indonesia)</h4>
                        <p>{{ $productCategory->pc_title_id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul (English)</h4>
                        <p>{{ $productCategory->pc_title_en }}</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi (Indonesia)</h4>
                        <p class="mt-1 whitespace-pre-line">{{ $productCategory->pc_description_id ?? '-' }}</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi (English)</h4>
                        <p class="mt-1 whitespace-pre-line">{{ $productCategory->pc_description_en ?? '-' }}</p>
                    </div>
                </div>
            </x-card>
            
            @if($productCategory->products->count() > 0)
                <div class="mt-6">
                    <x-card title="Produk dalam Kategori Ini">
                        <x-table :headers="['ID', 'Gambar', 'Judul (ID)', 'Status']">
                            @foreach($productCategory->products as $product)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $product->p_id }}</td>
                                    <td class="px-6 py-4">
                                        @if($product->p_image)
                                            <img src="{{ asset('storage/' . $product->p_image) }}" alt="Product Image" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-400">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $product->p_title_id }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $product->p_is_active ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                            {{ $product->p_is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('products.show', $product->p_id) }}" class="text-blue-500 hover:text-blue-700">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </x-table>
                    </x-card>
                </div>
            @endif
        </div>
        
        <div>
            <x-card title="Gambar Kategori">
                @if($productCategory->pc_image)
                    <img src="{{ asset('storage/' . $productCategory->pc_image) }}" alt="Category Image" class="w-full h-auto rounded">
                @else
                    <div class="flex items-center justify-center h-48 bg-gray-100 dark:bg-gray-700 rounded">
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada gambar</p>
                    </div>
                @endif
            </x-card>
        </div>
    </div>
@endsection