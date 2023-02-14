<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Laboratorium::all();
        return view('lab.index',[
            'title' => 'Laboratorium',
            'lab' => $lab
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lab.create',[
            'title' => 'Form Tambah Periksa Lab'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate
        ([
            'nama' => ['required'],
            'harga' => ['required'],
            
        ]);
        Laboratorium::create($validatedData);
        return redirect('/lab')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorium $laboratorium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorium $laboratorium)
    {
        return view('lab.edit',[
            'title' => 'Form Edit Laboratorium',
            'laboratorium' => $laboratorium
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorium $laboratorium)
    {
        $validatedData = $request->validate
        ([
            'nama' => ['required'],
            'harga' => ['required'],
            
        ]);
        Laboratorium::where('id', $laboratorium->id)->update($validatedData);
        return redirect('/lab')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorium $laboratorium)
    {
        
        Laboratorium::destroy($laboratorium);

        return redirect('/lab')->with('success', 'Data Berhasil Dihapus');
    }
}
