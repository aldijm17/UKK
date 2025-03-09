<?php

namespace App\Http\Controllers;

use App\Models\Bicycles;
use Illuminate\Http\Request;

class BicyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicycles = Bicycles::all();
        return view('bicycles.index', compact('bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'tipe' => 'required',
            'warna' => 'required',
            'deskripsi' => 'required',
            'harga_sewa' => 'required',
        ]);
        Bicycles::create($request->all());
        return redirect()->route('bicycles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Bicycles $bicycles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bicycles $bicycles, string $id)
    {
        $bicycles = Bicycles::findOrFail($id);
        return view('bicycles.edit', compact('bicycles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'merk' => 'required',
            'tipe' => 'required',
            'warna' => 'required',
            'deskripsi' => 'required',
            'harga_sewa' => 'required',
        ]);
        $bicycles = Bicycles::findOrFail($id);
        $bicycles->update($request->all());
        return redirect()->route('bicycles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bicycles $bicycles, string $id)
    {
        $bicycles = Bicycles::findOrFail($id);
        $bicycles->delete();
        return redirect()->route('bicycles.index');
    }
}
