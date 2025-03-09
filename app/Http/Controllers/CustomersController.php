<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customers.index',compact('customers'));
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
            'nama'=> 'required',
            'profil_img' => 'required',
            'alamat'=> 'required',
            'no_telpon'=> 'required',
            'email'=> 'required',

        ]);
        //upload image to public
        $imageName = time().'.'.$request->profil_img->extension();
        $request->profil_img->move(public_path('profil_img'), $imageName);

        Customers::create([
            'nama' => $request->nama,
            'profil_img' => 'profil_img/'.$imageName,
            'alamat' => $request->alamat,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
        ]);
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customers, string $id)
    {
        $customers = Customers::findOrFail($id);
        return view('customers.edit',compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=> 'required',
            'alamat'=> 'required',
            'no_telpon'=> 'required',
            'email'=> 'required',
        ]);
        $customers = Customers::findOrFail($id);
        if ($request->hasFile('profil_img')) {
            $request->validate([
                'profil_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            // Hapus foto lama jika ada
            if ($customers->profil_img && file_exists(public_path($customers->profil_img))) {
                unlink(public_path($customers->profil_img));
            }
    
            // Simpan foto baru
            $imageName = time().'.'.$request->profil_img->extension();
            $request->profil_img->move(public_path('profil_img'), $imageName);
            $customers->profil_img = 'profil_img/'.$imageName;
        }
        $customers->update(
        [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
        ]    
        );
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customers = Customers::findOrFail($id);
        $customers->delete();
        return redirect()->route('customers.index')->with('notification','Customer Berhasil Di Hapus');
    }
}
