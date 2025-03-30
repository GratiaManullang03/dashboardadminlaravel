@extends('layouts.app')

@section('title', 'Tambah Item Footer - Pazar Admin')

@section('page-title', 'Tambah Item Footer')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('footer.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('footer.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <x-form.input 
                        name="f_type" 
                        label="Tipe Item" 
                        placeholder="Contoh: contact, social, link, dll." 
                        :value="old('f_type')"
                        required
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="f_icon" 
                        label="Icon Class" 
                        placeholder="Contoh: fas fa-phone, fab fa-facebook, dll." 
                        :value="old('f_icon')"
                        helper="Masukkan class icon dari FontAwesome atau IconFont lainnya"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="f_label_id" 
                        label="Label (Indonesia)" 
                        placeholder="Masukkan label dalam Bahasa Indonesia" 
                        :value="old('f_label_id')"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="f_label_en" 
                        label="Label (English)" 
                        placeholder="Enter label in English" 
                        :value="old('f_label_en')"
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="f_description_id" 
                        label="Deskripsi (Indonesia)" 
                        placeholder="Masukkan deskripsi dalam Bahasa Indonesia" 
                        :value="old('f_description_id')"
                        rows="4"
                    />
                </div>
                
                <div>
                    <x-form.textarea 
                        name="f_description_en" 
                        label="Deskripsi (English)" 
                        placeholder="Enter description in English" 
                        :value="old('f_description_en')"
                        rows="4"
                    />
                </div>
                
                <div class="md:col-span-2">
                    <x-form.input 
                        type="url" 
                        name="f_link" 
                        label="Link" 
                        placeholder="https://example.com" 
                        :value="old('f_link')"
                        helper="Masukkan URL lengkap termasuk http:// atau https://"
                    />
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('footer.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Simpan
                </x-button>
            </div>
        </form>
    </x-card>
@endsection