<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $User = User::all();
        return view('loginregister.index', compact('User'));
    }

    public function register()
    {
        $user = User::all();
        return view('loginregister.register', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('loginregister.register', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = $request->all();
        $user['password'] = Hash::make($user['password']);
        User::create($user);
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
