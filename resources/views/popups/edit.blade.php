@extends('layouts.app')

@section('title', 'Edit Popup - Pazar Admin')

@section('page-title', 'Edit Popup')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('popups.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('popups.update', $popup->pu_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label for="pu_image" class="block mb-2 text-sm font-medium">Gambar Popup</label>
                    
                    @if($popup->pu_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $popup->pu_image) }}" alt="Current Popup Image" class="w-48 h-auto rounded">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Gambar saat ini</p>
                        </div>
                    @endif
                    
                    <input type="file" id="pu_image" name="pu_image" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    @error('pu_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <x-form.input 
                        type="url" 
                        name="pu_link" 
                        label="Link Popup" 
                        placeholder="https://example.com" 
                        :value="old('pu_link', $popup->pu_link)"
                        helper="Masukkan URL lengkap termasuk http:// atau https://"
                    />
                </div>
                
                <div>
                    <x-form.checkbox 
                        name="pu_is_active" 
                        id="pu_is_active" 
                        label="Popup Aktif" 
                        :checked="old('pu_is_active', $popup->pu_is_active)"
                        helper="Centang jika popup ini aktif"
                    />
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('popups.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Perbarui
                </x-button>
            </div>
        </form>
    </x-card>
@endsection