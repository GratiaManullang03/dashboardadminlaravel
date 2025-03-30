@extends('layouts.app')

@section('title', 'Headers - Pazar Admin')

@section('page-title', 'Headers')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-semibold">Daftar Headers</h2>
        <x-button href="{{ route('headers.create') }}" variant="primary">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Header
        </x-button>
    </div>
    
    <x-card>
        @if(count($headers) > 0)
            <x-table :headers="['ID', 'Halaman', 'Judul (ID)', 'Gambar', 'Link']">
                @foreach($headers as $header)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $header->h_id }}</td>
                        <td class="px-6 py-4">{{ $header->h_page_name }}</td>
                        <td class="px-6 py-4">{{ $header->h_title_id }}</td>
                        <td class="px-6 py-4">
                            @if($header->h_image)
                                <img src="{{ asset('storage/' . $header->h_image) }}" alt="Header Image" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($header->h_link)
                                <a href="{{ $header->h_link }}" target="_blank" class="text-blue-500 hover:underline">
                                    {{ Str::limit($header->h_link, 30) }}
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('headers.show', $header->h_id) }}" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('headers.edit', $header->h_id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('headers.destroy', $header->h_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus header ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        @else
            <div class="py-8 text-center">
                <p class="text-gray-400">Belum ada header yang ditambahkan</p>
                <x-button href="{{ route('headers.create') }}" variant="primary" class="mt-4">
                    Tambah Header
                </x-button>
            </div>
        @endif
    </x-card>
@endsection