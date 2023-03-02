<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::get();

        $this->data['pengguna'] = $data;
        return view('pengguna.index', $this->data);
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        //dd($hewan->nama_hewan);
        $saveUser = $user->save();

        //dd($saveHewan);
        if ($saveUser == true) {
            return redirect()->route('pengguna.index')->with('success', 'Data Petugas berhasil ditambah!');
        }else{
            return redirect()->route('pengguna.index')->with('validationErrors', 'Coba Dicek Lagi Cuy');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $deleteData = $user->delete();
        //dd($deleteData);


        if ($deleteData == true) {
            return redirect()->route('pengguna.index')->with('success', 'Data petugas berhasil dihapus');
        } else {
            return redirect()->route('pengguna.index')->with('ValidationErrors','Data Gak Bisa Diapain');
        }
    }
}
