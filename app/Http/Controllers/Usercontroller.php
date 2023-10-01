<?php

namespace App\Http\Controllers;

use App\Models\barangpenjual;
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

   public function dashboard(){
    $totalpenjual = User::where('role', 'penjual')->count();
    $totaluser = User::where('role', 'user')->count();
    $totalmenu = barangpenjual::all()->count();

    return view('welcome' , compact('totaluser', 'totalpenjual', 'totalmenu'));
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
        $request->validate([
            'name' => 'required|string|max:20|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama hanya boleh berisi huruf dan spasi',
            'name.max' => 'Nama maximal 20 karakter',
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maximmal 15 karakter',
            'confirm_password.required' => 'Konfirmasi Password wajib diisi',
            'confirm_password.same' => 'Konfirmasi Password harus sama dengan Password'
        ]);

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
