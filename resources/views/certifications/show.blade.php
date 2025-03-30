@extends('layouts.app')

@section('title', 'Detail Sertifikasi - Pazar Admin')

@section('page-title', 'Detail Sertifikasi')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <x-button href="{{ route('certifications.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
        
        <div class="flex space-x-2">
            <x-button href="{{ route('certifications.edit', $certification->c_id) }}" variant="primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </x-button>
            
            <form action="{{ route('certifications.destroy', $certification->c_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikasi ini?');">
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
            <x-card title="Informasi Sertifikasi">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <h4 class="text-sm font-medium text-gray-400">ID</h4>
                        <p>{{ $certification->c_id }}</p>
                    </div>
                    
                    @if($certification->c_label_id)
                    <div>
                        <h4 class="text-sm font-medium text-gray-400">Label (Indonesia)</h4>
                        <p>{{ $certification->c_label_id }}</p>
                    </div>
                    @endif
                    
                    @if($certification->c_label_en)
                    <div>
                        <h4 class="text-sm font-medium text-gray-400">Label (English)</h4>
                        <p>{{ $certification->c_label_en }}</p>
                    </div>
                    @endif
                    
                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-400">Judul (Indonesia)</h4>
                        <p>{{ $certification->c_title_id }}</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <h4 class="text-sm font-medium text-gray-400">Judul (English)</h4>
                        <p>{{ $certification->c_title_en }}</p>
                    </div>
                    
                    @if($certification->c_description_id)
                        <div class="md:col-span-2">
                            <h4 class="text-sm font-medium text-gray-400">Deskripsi (Indonesia)</h4>
                            <p class="mt-1 whitespace-pre-line">{{ $certification->c_description_id }}</p>
                        </div>
                    @endif
                    
                    @if($certification->c_description_en)
                        <div class="md:col-span-2">
                            <h4 class="text-sm font-medium text-gray-400">Deskripsi (English)</h4>
                            <p class="mt-1 whitespace-pre-line">{{ $certification->c_description_en }}</p>
                        </div>
                    @endif
                </div>
            </x-card>
        </div>
        
        <div>
            <x-card title="Gambar Sertifikasi">
                @if($certification->c_image)
                    <img src="{{ asset('storage/' . $certification->c_image) }}" alt="Certification Image" class="w-full h-auto rounded">
                @else
                    <div class="flex items-center justify-center h-48 bg-gray-700 rounded">
                        <p class="text-gray-400">Tidak ada gambar</p>
                    </div>
                @endif
            </x-card>
        </div>
    </div>
@endsection