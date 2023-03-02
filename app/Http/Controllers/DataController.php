<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Data::get();

       $this->data['data'] = $data;

       return view('datamasuk.index', $this->data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $data = new Data();
        $data->nopol = $request->nopol;
        $data->owner = $request->owner;
        $data->alamat = $request->alamat;
        $data->desa = $request->desa;
        $data->kecamatan = $request->kecamatan;
        $data->model = $request->model;
        //dd($hewan->nama_hewan);
        $saveData = $data->save();

        //dd($saveHewan);
        if ($saveData == true) {
            return redirect()->route('data.index')->with('success', 'Data Petugas berhasil ditambah!');
        }else{
            return redirect()->route('data.index')->with('validationErrors', 'Coba Dicek Lagi Cuy');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(c $c)
    {
        //
    }
}
