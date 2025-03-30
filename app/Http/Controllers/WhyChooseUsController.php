<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = WhyChooseUs::all();
        return view('why-choose-us.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('why-choose-us.create');
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
            'w_title_id' => 'required|string|max:255',
            'w_title_en' => 'required|string|max:255',
            'w_description_id' => 'nullable|string',
            'w_description_en' => 'nullable|string',
            'w_icon' => 'nullable|string|max:255'
        ]);
        
        WhyChooseUs::create($validated);
        
        return redirect()->route('why-choose-us.index')
            ->with('success', 'Item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function show(WhyChooseUs $whyChooseUs)
    {
        return view('why-choose-us.show', compact('whyChooseUs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyChooseUs $whyChooseUs)
    {
        return view('why-choose-us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $validated = $request->validate([
            'w_title_id' => 'required|string|max:255',
            'w_title_en' => 'required|string|max:255',
            'w_description_id' => 'nullable|string',
            'w_description_en' => 'nullable|string',
            'w_icon' => 'nullable|string|max:255'
        ]);
        
        $whyChooseUs->update($validated);
        
        return redirect()->route('why-choose-us.index')
            ->with('success', 'Item berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->delete();
        
        return redirect()->route('why-choose-us.index')
            ->with('success', 'Item berhasil dihapus.');
    }
}