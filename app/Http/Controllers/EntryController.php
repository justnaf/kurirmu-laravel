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
        $data = Entry::with('data','users')->get();

        // dd($data);
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
        // dd($request->user()->id);
        //dd($request);
        $validasi = Entry::where('data_id', $request->data_id)->first();

        // dd($validasi);
        if($validasi){
            return redirect()->route('entry.index')->with('success', 'Data Sudah Di Entry');
        }else{
            $data = new Entry();
            $data->users_id = $request->user()->id;
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
    public function destroy(string $id)
    {
        $data = Entry::find($id);
        $deleteData = $data->delete();
        //dd($deleteData);


        if ($deleteData == true) {
            return redirect()->route('entry.index')->with('success', 'Data kendaraan berhasil dihapus');
        } else {
            return redirect()->route('entry.index')->with('ValidationErrors','Data Gak Bisa Diapain');
        }
    }
}
