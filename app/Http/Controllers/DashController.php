<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\User;
use App\Models\Data;
use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entry = Entry::get();
        $data = Data::get();
        $petugas = User::where('role','=','user')->get();

        // dd($entry);

        $this->data['entry'] = $entry;
        $this->data['data'] = $data;
        $this->data['petugas'] = $petugas;

        return view('dashboard.admin',$this->data);
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
        //
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
        //
    }
}
