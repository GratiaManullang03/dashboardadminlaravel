@extends('layouts.app')

@section('title', 'Detail Why Choose Us - Pazar Admin')

@section('page-title', 'Detail Why Choose Us')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <x-button href="{{ route('why-choose-us.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
        
        <div class="flex space-x-2">
            <x-button href="{{ route('why-choose-us.edit', $whyChooseUs->w_id) }}" variant="primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </x-button>
            
            <form action="{{ route('why-choose-us.destroy', $whyChooseUs->w_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
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
        <div class="flex flex-col md:flex-row gap-6">
            @if($whyChooseUs->w_icon)
                <div class="md:w-1/6 flex justify-center">
                    <div class="w-24 h-24 flex items-center justify-center text-white text-4xl bg-accent rounded-full">
                        <i class="{{ $whyChooseUs->w_icon }}"></i>
                    </div>
                </div>
            @endif
            
            <div class="md:w-5/6">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-400">ID</h4>
                        <p>{{ $whyChooseUs->w_id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-400">Judul (Indonesia)</h4>
                        <p class="text-lg font-semibold">{{ $whyChooseUs->w_title_id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-400">Judul (English)</h4>
                        <p class="text-lg font-semibold">{{ $whyChooseUs->w_title_en }}</p>
                    </div>
                    
                    @if($whyChooseUs->w_description_id)
                        <div>
                            <h4 class="text-sm font-medium text-gray-400">Deskripsi (Indonesia)</h4>
                            <p class="mt-1 whitespace-pre-line">{{ $whyChooseUs->w_description_id }}</p>
                        </div>
                    @endif
                    
                    @if($whyChooseUs->w_description_en)
                        <div>
                            <h4 class="text-sm font-medium text-gray-400">Deskripsi (English)</h4>
                            <p class="mt-1 whitespace-pre-line">{{ $whyChooseUs->w_description_en }}</p>
                        </div>
                    @endif
                    
                    @if($whyChooseUs->w_icon)
                        <div>
                            <h4 class="text-sm font-medium text-gray-400">Icon Class</h4>
                            <p class="font-mono">{{ $whyChooseUs->w_icon }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-card>
@endsection