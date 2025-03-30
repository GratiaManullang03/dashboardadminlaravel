@extends('layouts.app')

@section('title', 'Dashboard - Pazar Admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card 1 -->
        <x-card class="border-l-4 border-accent">
            <div class="flex items-center">
                <div class="p-3 mr-4 rounded-full bg-accent bg-opacity-10">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Produk</p>
                    <p class="text-lg font-semibold">{{ $productCount ?? 0 }}</p>
                </div>
            </div>
        </x-card>

        <!-- Card 2 -->
        <x-card class="border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 mr-4 rounded-full bg-blue-500 bg-opacity-10">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori Produk</p>
                    <p class="text-lg font-semibold">{{ $categoryCount ?? 0 }}</p>
                </div>
            </div>
        </x-card>

        <!-- Card 3 -->
        <x-card class="border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 mr-4 rounded-full bg-green-500 bg-opacity-10">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Sertifikasi</p>
                    <p class="text-lg font-semibold">{{ $certificationCount ?? 0 }}</p>
                </div>
            </div>
        </x-card>

        <!-- Card 4 -->
        <x-card class="border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="p-3 mr-4 rounded-full bg-purple-500 bg-opacity-10">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pengguna</p>
                    <p class="text-lg font-semibold">{{ $userCount ?? 0 }}</p>
                </div>
            </div>
        </x-card>
    </div>

    <!-- Recent Products -->
    <div class="mt-8">
        <x-card title="Produk Terbaru">
            @if(isset($recentProducts) && count($recentProducts) > 0)
                <x-table :headers="['ID', 'Nama Produk', 'Kategori', 'Status', 'Tanggal Dibuat']">
                    @foreach($recentProducts as $product)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $product->p_id }}</td>
                            <td class="px-6 py-4">{{ $product->p_title_id }}</td>
                            <td class="px-6 py-4">{{ $product->category->pc_title_id }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $product->p_is_active ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                    {{ $product->p_is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $product->p_created_at }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('products.show', $product->p_id) }}" class="text-blue-500 hover:text-blue-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('products.edit', $product->p_id) }}" class="text-yellow-500 hover:text-yellow-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            @else
                <div class="py-8 text-center">
                    <p class="text-gray-500 dark:text-gray-400">Belum ada produk yang ditambahkan</p>
                </div>
            @endif
        </x-card>
    </div>
@endsection