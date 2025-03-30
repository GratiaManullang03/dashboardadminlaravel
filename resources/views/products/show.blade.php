@extends('layouts.app')

@section('title', 'Detail Produk - Pazar Admin')

@section('page-title', 'Detail Produk')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <x-button href="{{ route('products.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
        
        <div class="flex space-x-2">
            <x-button href="{{ route('products.edit', $product->p_id) }}" variant="primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </x-button>
            
            <form action="{{ route('products.destroy', $product->p_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
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
            <x-card title="Informasi Produk">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</h4>
                        <p>{{ $product->p_id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h4>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $product->p_is_active ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100' }}">
                            {{ $product->p_is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Produk (Indonesia)</h4>
                        <p>{{ $product->p_title_id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Produk (English)</h4>
                        <p>{{ $product->p_title_en }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</h4>
                        @if($product->category)
                            <a href="{{ route('product-categories.show', $product->category->pc_id) }}" class="text-blue-500 hover:underline">
                                {{ $product->category->pc_title_id }}
                            </a>
                        @else
                            <p class="text-gray-400">-</p>
                        @endif
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Link</h4>
                        @if($product->p_link)
                            <a href="{{ $product->p_link }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ Str::limit($product->p_link, 30) }}
                            </a>
                        @else
                            <p class="text-gray-400">-</p>
                        @endif
                    </div>
                    
                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi Singkat (Indonesia)</h4>
                        <p class="mt-1 whitespace-pre-line">{{ $product->p_description_id ?? '-' }}</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi Singkat (English)</h4>
                        <p class="mt-1 whitespace-pre-line">{{ $product->p_description_en ?? '-' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Dibuat Oleh</h4>
                        <p>{{ $product->p_created_by }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Dibuat</h4>
                        <p>{{ $product->p_created_at->format('d M Y H:i') }}</p>
                    </div>
                    
                    @if($product->p_updated_by)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Diperbarui Oleh</h4>
                            <p>{{ $product->p_updated_by }}</p>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Diperbarui</h4>
                            <p>{{ $product->p_updated_at->format('d M Y H:i') }}</p>
                        </div>
                    @endif
                </div>
            </x-card>
            
            <div class="mt-6">
                <x-card>
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">Detail Produk</h3>
                        
                        @if($product->detail)
                            <x-button href="{{ route('product-details.edit', $product->p_id) }}" variant="primary" size="sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Detail
                            </x-button>
                        @else
                            <x-button href="{{ route('product-details.edit', $product->p_id) }}" variant="primary" size="sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Detail
                            </x-button>
                        @endif
                    </div>
                    
                    @if($product->detail)
                        <div class="space-y-4">
                            <!-- Marketplace Links -->
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                                <div class="col-span-4">
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Link Marketplace</h4>
                                </div>
                                
                                @if($product->detail->pd_link_shopee)
                                    <div>
                                        <a href="{{ $product->detail->pd_link_shopee }}" target="_blank" class="flex items-center p-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            Shopee
                                        </a>
                                    </div>
                                @endif
                                
                                @if($product->detail->pd_link_tokopedia)
                                    <div>
                                        <a href="{{ $product->detail->pd_link_tokopedia }}" target="_blank" class="flex items-center p-2 bg-green-500 text-white rounded hover:bg-green-600">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            Tokopedia
                                        </a>
                                    </div>
                                @endif
                                
                                @if($product->detail->pd_link_blibli)
                                    <div>
                                        <a href="{{ $product->detail->pd_link_blibli }}" target="_blank" class="flex items-center p-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            Blibli
                                        </a>
                                    </div>
                                @endif
                                
                                @if($product->detail->pd_link_lazada)
                                    <div>
                                        <a href="{{ $product->detail->pd_link_lazada }}" target="_blank" class="flex items-center p-2 bg-blue-700 text-white rounded hover:bg-blue-800">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            Lazada
                                        </a>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Long Description -->
                            @if($product->detail->pd_longdesc_id)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Deskripsi Lengkap (Indonesia)</h4>
                                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                        <p class="whitespace-pre-line">{{ $product->detail->pd_longdesc_id }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($product->detail->pd_longdesc_en)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Deskripsi Lengkap (English)</h4>
                                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                        <p class="whitespace-pre-line">{{ $product->detail->pd_longdesc_en }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- History -->
                            @if($product->detail->pd_history_id)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Sejarah Produk (Indonesia)</h4>
                                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                        <p class="whitespace-pre-line">{{ $product->detail->pd_history_id }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($product->detail->pd_history_en)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Sejarah Produk (English)</h4>
                                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                        <p class="whitespace-pre-line">{{ $product->detail->pd_history_en }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="py-8 text-center">
                            <p class="text-gray-500 dark:text-gray-400">Belum ada detail produk yang ditambahkan</p>
                        </div>
                    @endif
                </x-card>
            </div>
        </div>
        
        <div>
            <x-card title="Gambar Produk">
                @if($product->p_image)
                    <img src="{{ asset('storage/' . $product->p_image) }}" alt="Product Image" class="w-full h-auto rounded">
                @else
                    <div class="flex items-center justify-center h-64 bg-gray-100 dark:bg-gray-700 rounded">
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada gambar</p>
                    </div>
                @endif
            </x-card>
        </div>
    </div>
@endsection