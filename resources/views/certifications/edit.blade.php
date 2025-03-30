@extends('layouts.app')

@section('title', 'Edit Sertifikasi - Pazar Admin')

@section('page-title', 'Edit Sertifikasi')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('certifications.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('certifications.update', $certification->c_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <x-form.input 
                        name="c_label_id" 
                        label="Label (Indonesia)" 
                        placeholder="Masukkan label dalam Bahasa Indonesia" 
                        :value="old('c_label_id', $certification->c_label_id)"
                        helper="Contoh: ISO, Halal, dll."
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="c_label_en" 
                        label="Label (English)" 
                        placeholder="Enter label in English" 
                        :value="old('c_label_en', $certification->c_label_en)"
                        helper="Example: ISO, Halal, etc."
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="c_title_id" 
                        label="Judul (Indonesia)" 
                        placeholder="Masukkan judul dalam Bahasa Indonesia" 
                        :value="old('c_title_id', $certification->c_title_id)"
                        required
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="c_title_en" 
                        label="Judul (English)" 
                        placeholder="Enter title in English" 
                        :value="old('c_title_en', $certification->c_title_en)"
                        required
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="c_description_id" 
                        label="Deskripsi (Indonesia)" 
                        placeholder="Masukkan deskripsi dalam Bahasa Indonesia" 
                        :value="old('c_description_id', $certification->c_description_id)"
                        rows="4"
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="c_description_en" 
                        label="Deskripsi (English)" 
                        placeholder="Enter description in English" 
                        :value="old('c_description_en', $certification->c_description_en)"
                        rows="4"
                    />
                </div>
                
                <div class="md:col-span-2">
                    <label for="c_image" class="block mb-2 text-sm font-medium">Gambar Sertifikasi</label>
                    
                    @if($certification->c_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $certification->c_image) }}" alt="Current Certification Image" class="w-32 h-32 object-cover rounded">
                            <p class="mt-1 text-xs text-gray-400">Gambar saat ini</p>
                        </div>
                    @endif
                    
                    <input type="file" id="c_image" name="c_image" class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-accent focus:border-accent bg-gray-700 text-white">
                    <p class="mt-1 text-xs text-gray-400">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    @error('c_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('certifications.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Perbarui
                </x-button>
            </div>
        </form>
    </x-card>
@endsection