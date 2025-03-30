@extends('layouts.app')

@section('title', 'Tambah Produk - Pazar Admin')

@section('page-title', 'Tambah Produk')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('products.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <x-form.input 
                        name="p_title_id" 
                        label="Nama Produk (Indonesia)" 
                        placeholder="Masukkan nama produk dalam Bahasa Indonesia" 
                        :value="old('p_title_id')"
                        required
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="p_title_en" 
                        label="Nama Produk (English)" 
                        placeholder="Enter product name in English" 
                        :value="old('p_title_en')"
                        required
                    />
                </div>
                
                <div>
                    <x-form.select 
                        name="p_id_product_category" 
                        label="Kategori Produk" 
                        :options="$categories" 
                        :selected="old('p_id_product_category')"
                        required
                        placeholder="Pilih kategori produk"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        type="url" 
                        name="p_link" 
                        label="Link Produk" 
                        placeholder="https://example.com/product" 
                        :value="old('p_link')"
                        helper="Masukkan URL lengkap termasuk http:// atau https://"
                    />
                </div>
                
                <div class="md:col-span-2">
                    <x-form.textarea 
                        name="p_description_id" 
                        label="Deskripsi Singkat (Indonesia)" 
                        placeholder="Masukkan deskripsi singkat dalam Bahasa Indonesia" 
                        :value="old('p_description_id')"
                        rows="3"
                    />
                </div>
                
                <div class="md:col-span-2">
                    <x-form.textarea 
                        name="p_description_en" 
                        label="Deskripsi Singkat (English)" 
                        placeholder="Enter short description in English" 
                        :value="old('p_description_en')"
                        rows="3"
                    />
                </div>
                
                <div>
                    <label for="p_image" class="block mb-2 text-sm font-medium">Gambar Produk</label>
                    <input type="file" id="p_image" name="p_image" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB.</p>
                    @error('p_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <x-form.checkbox 
                        name="p_is_active" 
                        id="p_is_active" 
                        label="Produk Aktif" 
                        :checked="old('p_is_active', true)"
                        helper="Centang jika produk ini aktif"
                    />
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('products.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Simpan
                </x-button>
            </div>
        </form>
    </x-card>
@endsection