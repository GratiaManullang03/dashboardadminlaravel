<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups = Popup::all();
        return view('popups.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popups.create');
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
            'pu_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pu_link' => 'nullable|url|max:255',
            'pu_is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('pu_image')) {
            $path = $request->file('pu_image')->store('popups', 'public');
            $validated['pu_image'] = $path;
        }
        
        $validated['pu_is_active'] = $request->has('pu_is_active');
        
        Popup::create($validated);
        
        return redirect()->route('popups.index')
            ->with('success', 'Popup berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function show(Popup $popup)
    {
        return view('popups.show', compact('popup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function edit(Popup $popup)
    {
        return view('popups.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popup $popup)
    {
        $validated = $request->validate([
            'pu_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pu_link' => 'nullable|url|max:255',
            'pu_is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('pu_image')) {
            // Hapus file lama jika ada
            if ($popup->pu_image) {
                Storage::disk('public')->delete($popup->pu_image);
            }
            
            $path = $request->file('pu_image')->store('popups', 'public');
            $validated['pu_image'] = $path;
        }
        
        $validated['pu_is_active'] = $request->has('pu_is_active');
        
        $popup->update($validated);
        
        return redirect()->route('popups.index')
            ->with('success', 'Popup berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Popup $popup)
    {
        // Hapus file jika ada
        if ($popup->pu_image) {
            Storage::disk('public')->delete($popup->pu_image);
        }
        
        $popup->delete();
        
        return redirect()->route('popups.index')
            ->with('success', 'Popup berhasil dihapus.');
    }
}