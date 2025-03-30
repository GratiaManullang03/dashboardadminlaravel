@extends('layouts.app')

@section('title', 'Tambah Kategori Produk - Pazar Admin')

@section('page-title', 'Tambah Kategori Produk')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('product-categories.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('product-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <x-form.input 
                        name="pc_title_id" 
                        label="Judul (Indonesia)" 
                        placeholder="Masukkan judul dalam Bahasa Indonesia" 
                        :value="old('pc_title_id')"
                        required
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="pc_title_en" 
                        label="Judul (English)" 
                        placeholder="Enter title in English" 
                        :value="old('pc_title_en')"
                        required
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="pc_description_id" 
                        label="Deskripsi (Indonesia)" 
                        placeholder="Masukkan deskripsi dalam Bahasa Indonesia" 
                        :value="old('pc_description_id')"
                        rows="4"
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="pc_description_en" 
                        label="Deskripsi (English)" 
                        placeholder="Enter description in English" 
                        :value="old('pc_description_en')"
                        rows="4"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        type="url" 
                        name="pc_link" 
                        label="Link" 
                        placeholder="https://example.com/category" 
                        :value="old('pc_link')"
                        helper="Masukkan URL lengkap termasuk http:// atau https://"
                    />
                </div>
                
                <div>
                    <label for="pc_image" class="block mb-2 text-sm font-medium">Gambar Kategori</label>
                    <input type="file" id="pc_image" name="pc_image" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB.</p>
                    @error('pc_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('product-categories.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Simpan
                </x-button>
            </div>
        </form>
    </x-card>
@endsection