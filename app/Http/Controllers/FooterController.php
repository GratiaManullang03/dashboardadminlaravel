<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerItems = Footer::all();
        return view('footer.index', compact('footerItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('footer.create');
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
            'f_type' => 'required|string|max:50',
            'f_label_id' => 'nullable|string|max:255',
            'f_label_en' => 'nullable|string|max:255',
            'f_description_id' => 'nullable|string',
            'f_description_en' => 'nullable|string',
            'f_icon' => 'nullable|string|max:255',
            'f_link' => 'nullable|url|max:255'
        ]);
        
        Footer::create($validated);
        
        return redirect()->route('footer.index')
            ->with('success', 'Item footer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        return view('footer.show', compact('footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        return view('footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $validated = $request->validate([
            'f_type' => 'required|string|max:50',
            'f_label_id' => 'nullable|string|max:255',
            'f_label_en' => 'nullable|string|max:255',
            'f_description_id' => 'nullable|string',
            'f_description_en' => 'nullable|string',
            'f_icon' => 'nullable|string|max:255',
            'f_link' => 'nullable|url|max:255'
        ]);
        
        $footer->update($validated);
        
        return redirect()->route('footer.index')
            ->with('success', 'Item footer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        $footer->delete();
        
        return redirect()->route('footer.index')
            ->with('success', 'Item footer berhasil dihapus.');
    }
}