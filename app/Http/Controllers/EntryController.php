<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Entry::with('data')->get();

        $nopol = Data::get();

        // dd($data);

        $this->data['entry'] = $data;
        $this->data['nopol'] = $nopol;

        return view('entry.index',$this->data);
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
        // dd($request);
        //dd($request);
        $data = new Entry();
        $data->data_id = $request->data_id;
        $data->no_telp = $request->no_telp;
        $data->status = $request->status;
        $data->notes = $request->notes;
        //dd($hewan->nama_hewan);
        $saveData = $data->save();

        //dd($saveHewan);
        if ($saveData == true) {
            return redirect()->route('entry.index')->with('success', 'Data Petugas berhasil ditambah!');
        }else{
            return redirect()->route('entry.index')->with('validationErrors', 'Coba Dicek Lagi Cuy');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entry $entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        //
    }
}
