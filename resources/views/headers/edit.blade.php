@extends('layouts.app')

@section('title', 'Edit Header - Pazar Admin')

@section('page-title', 'Edit Header')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('headers.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('headers.update', $header->h_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <x-form.input 
                        name="h_page_name" 
                        label="Nama Halaman" 
                        placeholder="Contoh: Home, About, Products, etc." 
                        :value="old('h_page_name', $header->h_page_name)"
                        required
                    />
                </div>
                
                <div>
                    <x-form.input 
                        type="url" 
                        name="h_link" 
                        label="Link" 
                        placeholder="https://example.com" 
                        :value="old('h_link', $header->h_link)"
                        helper="Masukkan URL lengkap termasuk http:// atau https://"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="h_title_id" 
                        label="Judul (Indonesia)" 
                        placeholder="Masukkan judul dalam Bahasa Indonesia" 
                        :value="old('h_title_id', $header->h_title_id)"
                        required
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="h_title_en" 
                        label="Judul (English)" 
                        placeholder="Enter title in English" 
                        :value="old('h_title_en', $header->h_title_en)"
                        required
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="h_description_id" 
                        label="Deskripsi (Indonesia)" 
                        placeholder="Masukkan deskripsi dalam Bahasa Indonesia" 
                        :value="old('h_description_id', $header->h_description_id)"
                        rows="4"
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="h_description_en" 
                        label="Deskripsi (English)" 
                        placeholder="Enter description in English" 
                        :value="old('h_description_en', $header->h_description_en)"
                        rows="4"
                    />
                </div>
                
                <div class="md:col-span-2">
                    <label for="h_image" class="block mb-2 text-sm font-medium">Gambar Header</label>
                    
                    @if($header->h_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $header->h_image) }}" alt="Current Header Image" class="w-32 h-32 object-cover rounded">
                            <p class="mt-1 text-xs text-gray-400">Gambar saat ini</p>
                        </div>
                    @endif
                    
                    <input type="file" id="h_image" name="h_image" class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-accent focus:border-accent bg-gray-700 text-white">
                    <p class="mt-1 text-xs text-gray-400">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    @error('h_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('headers.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Perbarui
                </x-button>
            </div>
        </form>
    </x-card>
@endsection