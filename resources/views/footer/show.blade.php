@extends('layouts.app')

@section('title', 'Detail Item Footer - Pazar Admin')

@section('page-title', 'Detail Item Footer')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <x-button href="{{ route('footer.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
        
        <div class="flex space-x-2">
            <x-button href="{{ route('footer.edit', $footer->f_id) }}" variant="primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </x-button>
            
            <form action="{{ route('footer.destroy', $footer->f_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
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
    
    <x-card>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <h4 class="text-sm font-medium text-gray-400">ID</h4>
                <p>{{ $footer->f_id }}</p>
            </div>
            
            <div>
                <h4 class="text-sm font-medium text-gray-400">Tipe</h4>
                <p>{{ $footer->f_type }}</p>
            </div>
            
            @if($footer->f_icon)
                <div>
                    <h4 class="text-sm font-medium text-gray-400">Icon</h4>
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center bg-accent rounded-full text-white">
                            <i class="{{ $footer->f_icon }}"></i>
                        </div>
                        <span class="ml-3 font-mono">{{ $footer->f_icon }}</span>
                    </div>
                </div>
            @endif
            
            @if($footer->f_link)
                <div>
                    <h4 class="text-sm font-medium text-gray-400">Link</h4>
                    <a href="{{ $footer->f_link }}" target="_blank" class="text-blue-500 hover:underline">
                        {{ $footer->f_link }}
                    </a>
                </div>
            @endif
            
            @if($footer->f_label_id)
                <div>
                    <h4 class="text-sm font-medium text-gray-400">Label (Indonesia)</h4>
                    <p>{{ $footer->f_label_id }}</p>
                </div>
            @endif
            
            @if($footer->f_label_en)
                <div>
                    <h4 class="text-sm font-medium text-gray-400">Label (English)</h4>
                    <p>{{ $footer->f_label_en }}</p>
                </div>
            @endif
            
            @if($footer->f_description_id)
                <div class="md:col-span-2">
                    <h4 class="text-sm font-medium text-gray-400">Deskripsi (Indonesia)</h4>
                    <p class="mt-1 whitespace-pre-line">{{ $footer->f_description_id }}</p>
                </div>
            @endif
            
            @if($footer->f_description_en)
                <div class="md:col-span-2">
                    <h4 class="text-sm font-medium text-gray-400">Deskripsi (English)</h4>
                    <p class="mt-1 whitespace-pre-line">{{ $footer->f_description_en }}</p>
                </div>
            @endif
        </div>
    </x-card>
@endsection