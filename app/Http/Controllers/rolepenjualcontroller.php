<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\penjual;
use App\Models\penjuallogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('loginregister.register_penjual', compact('user', 'penjuallogin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'nama_toko' => 'required',
            'foto_toko' => 'required',
            'alamat_toko' => 'required|max:100',
            'notlp' => 'required|min:10'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'confirm_password.required' => 'Konfirmasi Password wajib diisi',
            'confirm_password.same' => 'Konfirmasi Password harus sama dengan Password',
            'nama_toko.required' => 'Nama Toko wajib diisi',
            'foto_toko.required' => 'Foto Toko wajib diupload',
            'alamat_toko.required' => 'Alamat Toko wajib diisi',
            'alamat_toko.max' => 'Alamat Toko maksimal 100 karakter',
            'notlp.required' => 'Nomor Telepon wajib diisi',
            'notlp.min' => 'Nomor Telepon minimal 10 karakter'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'penjualnotapprove',
        ]);

        $foto_tokoPath = null; // Inisialisasi variabel foto_tokoPath dengan null

        if ($request->hasFile('foto_toko')) {
            $filePath = Storage::disk('public')->put('foto_toko', $request->file('foto_toko'));
            $foto_tokoPath = $filePath; // Set foto_tokoPath jika ada file yang diunggah
        }

        User::find($user->id)->penjuallogin()->create([
            'nama_toko' => $request->nama_toko,
            'foto_toko' => $foto_tokoPath, // Simpan path ke database, bahkan jika foto_tokoPath adalah null
            'alamat_toko' => $request->alamat_toko,
            'notlp' => $request->notlp
        ]);

        return redirect()->route('user.index')->with('warning', 'tunggu proses konfirmasi akun anda');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nama_toko' => 'required',
            'foto_toko' => 'required',
            'alamat_toko' => 'required|max:100',
            'notlp' => 'required|min:10'
        ], [
            'name.required' => 'Nama Wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimum password yang diizinkan 8 karakter',
            'nama_toko.require' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Melebihi Batas Maksimum',
            'notlp.min' => 'Minimum Nomor yang diizinkan 10 karakter'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
