<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('r_role_name', 'r_id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'u_nik' => 'required|string|max:20',
            'u_username' => 'required|string|max:50|unique:login.users,u_username',
            'u_email' => 'required|email|max:100|unique:login.users,u_email',
            'u_password' => 'required|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:login.role,r_id'
        ]);
        
        // Hash password
        $validated['u_password'] = Hash::make($validated['u_password']);
        
        // Create user
        $user = User::create($validated);
        
        // Assign roles
        if (isset($validated['roles'])) {
            $user->roles()->attach($validated['roles']);
        }
        
        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('r_role_name', 'r_id');
        $userRoles = $user->roles->pluck('r_id')->toArray();
        
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'u_nik' => 'required|string|max:20',
            'u_username' => ['required', 'string', 'max:50', Rule::unique('login.users', 'u_username')->ignore($user->u_id, 'u_id')],
            'u_email' => ['required', 'email', 'max:100', Rule::unique('login.users', 'u_email')->ignore($user->u_id, 'u_id')],
            'u_password' => 'nullable|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:login.role,r_id'
        ]);
        
        // Update password if provided
        if (isset($validated['u_password'])) {
            $validated['u_password'] = Hash::make($validated['u_password']);
        } else {
            unset($validated['u_password']);
        }
        
        // Update user
        $user->update($validated);
        
        // Sync roles
        if (isset($validated['roles'])) {
            $user->roles()->sync($validated['roles']);
        } else {
            $user->roles()->detach();
        }
        
        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Detach all roles first
        $user->roles()->detach();
        
        // Delete user
        $user->delete();
        
        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}