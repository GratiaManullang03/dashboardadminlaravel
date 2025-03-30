<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header::all();
        return view('headers.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headers.create');
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
            'h_page_name' => 'required|string|max:255',
            'h_title_id' => 'required|string|max:255',
            'h_title_en' => 'required|string|max:255',
            'h_description_id' => 'nullable|string',
            'h_description_en' => 'nullable|string',
            'h_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'h_link' => 'nullable|url|max:255'
        ]);
        
        if ($request->hasFile('h_image')) {
            $path = $request->file('h_image')->store('headers', 'public');
            $validated['h_image'] = $path;
        }
        
        Header::create($validated);
        
        return redirect()->route('headers.index')
            ->with('success', 'Header berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        return view('headers.show', compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
        return view('headers.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        $validated = $request->validate([
            'h_page_name' => 'required|string|max:255',
            'h_title_id' => 'required|string|max:255',
            'h_title_en' => 'required|string|max:255',
            'h_description_id' => 'nullable|string',
            'h_description_en' => 'nullable|string',
            'h_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'h_link' => 'nullable|url|max:255'
        ]);
        
        if ($request->hasFile('h_image')) {
            // Hapus file lama jika ada
            if ($header->h_image) {
                Storage::disk('public')->delete($header->h_image);
            }
            
            $path = $request->file('h_image')->store('headers', 'public');
            $validated['h_image'] = $path;
        }
        
        $header->update($validated);
        
        return redirect()->route('headers.index')
            ->with('success', 'Header berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        // Hapus file jika ada
        if ($header->h_image) {
            Storage::disk('public')->delete($header->h_image);
        }
        
        $header->delete();
        
        return redirect()->route('headers.index')
            ->with('success', 'Header berhasil dihapus.');
    }
}