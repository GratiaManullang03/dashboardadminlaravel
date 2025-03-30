<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = Certification::all();
        return view('certifications.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certifications.create');
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
            'c_label_id' => 'nullable|string|max:255',
            'c_label_en' => 'nullable|string|max:255',
            'c_title_id' => 'required|string|max:255',
            'c_title_en' => 'required|string|max:255',
            'c_description_id' => 'nullable|string',
            'c_description_en' => 'nullable|string',
            'c_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->hasFile('c_image')) {
            $path = $request->file('c_image')->store('certifications', 'public');
            $validated['c_image'] = $path;
        }
        
        Certification::create($validated);
        
        return redirect()->route('certifications.index')
            ->with('success', 'Sertifikasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification)
    {
        return view('certifications.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification)
    {
        return view('certifications.edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'c_label_id' => 'nullable|string|max:255',
            'c_label_en' => 'nullable|string|max:255',
            'c_title_id' => 'required|string|max:255',
            'c_title_en' => 'required|string|max:255',
            'c_description_id' => 'nullable|string',
            'c_description_en' => 'nullable|string',
            'c_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->hasFile('c_image')) {
            // Hapus file lama jika ada
            if ($certification->c_image) {
                Storage::disk('public')->delete($certification->c_image);
            }
            
            $path = $request->file('c_image')->store('certifications', 'public');
            $validated['c_image'] = $path;
        }
        
        $certification->update($validated);
        
        return redirect()->route('certifications.index')
            ->with('success', 'Sertifikasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification)
    {
        // Hapus file jika ada
        if ($certification->c_image) {
            Storage::disk('public')->delete($certification->c_image);
        }
        
        $certification->delete();
        
        return redirect()->route('certifications.index')
            ->with('success', 'Sertifikasi berhasil dihapus.');
    }
}