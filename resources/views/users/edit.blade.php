@extends('layouts.app')

@section('title', 'Edit Pengguna - Pazar Admin')

@section('page-title', 'Edit Pengguna')

@section('content')
    <div class="mb-6">
        <x-button href="{{ route('users.index') }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('users.update', $user->u_id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <x-form.input 
                        name="u_nik" 
                        label="NIK" 
                        placeholder="Masukkan NIK" 
                        :value="old('u_nik', $user->u_nik)"
                        required
                        helper="NIK harus unik dan maksimal 20 karakter"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        name="u_username" 
                        label="Username" 
                        placeholder="Masukkan username" 
                        :value="old('u_username', $user->u_username)"
                        required
                        helper="Username harus unik dan maksimal 50 karakter"
                    />
                </div>
                
                <div>
                    <x-form.input 
                        type="email" 
                        name="u_email" 
                        label="Email" 
                        placeholder="Masukkan email" 
                        :value="old('u_email', $user->u_email)"
                        required
                        helper="Email harus unik dan valid"
                    />
                </div>
                
                <div class="md:col-span-2">
                    <h4 class="text-sm font-medium mb-2">Role</h4>
                    <div class="p-4 bg-gray-700 rounded-md border border-gray-600">
                        @foreach($roles as $id => $roleName)
                            <div class="mb-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="roles[]" value="{{ $id }}" 
                                        {{ in_array($id, old('roles', $userRoles)) ? 'checked' : '' }}
                                        class="w-4 h-4 text-accent border-gray-600 rounded focus:ring-accent focus:ring-opacity-50">
                                    <span class="ml-2">{{ $roleName }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div>
                    <x-form.input 
                        type="password" 
                        name="u_password" 
                        label="Password" 
                        placeholder="Masukkan password baru" 
                        helper="Biarkan kosong jika tidak ingin mengubah password. Minimal 8 karakter."
                    />
                </div>
                
                <div>
                    <x-form.input 
                        type="password" 
                        name="u_password_confirmation" 
                        label="Konfirmasi Password" 
                        placeholder="Konfirmasi password baru" 
                    />
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('users.index') }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    Perbarui
                </x-button>
            </div>
        </form>
    </x-card>
@endsection