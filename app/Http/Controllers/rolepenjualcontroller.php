<?php

namespace App\Http\Controllers;

use App\Models\penjual;
use App\Models\penjuallogin;
use App\Models\User;
use Illuminate\Http\Request;

class rolepenjualcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('loginregister.register_penjual', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $penjuallogin = penjuallogin::all();
        return view('loginregister.register_penjual', compact('user'), 'penjuallogin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'penjualnotapprove',
        ]);

        User::find($user->id)->penjuallogin()->create([
            'nama_toko' => $request->nama_toko,
            'foto_toko' => $request->foto_toko,
            'alamat_toko' => $request->alamat_toko,
            'notlp' => $request->notlp
        ]);


        return redirect()->route('user.index');
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
