<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\penjuallogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\PasswordReset;

class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $penjuallogin = penjuallogin::all();
        return view('loginregister.index', compact('user', 'penjuallogin'));
    }
    public function authenticate(Request $request): RedirectResponse
    {
        // dd($request->all());
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'email tidak valid',
            'password.required' => 'password tidak boleh kosong'
        ]);
        $penjuallogin = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($penjuallogin)) {
            if (auth()->user()->role == 'penjual') {
                return redirect()->route('DashboardPenjual_');
            }
        }
        if (Auth::attempt($penjuallogin)) {
            if (auth()->user()->role == 'penjualnotapprove') {
                return redirect()->route('DashboardPenjual.index')->with('warning', 'tunggu proses konfirmasi pembuatan akun anda');
            }
        }
        if (Auth::attempt($user)) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('DashboardAdmin');
            }
        }
        if (Auth::attempt($user)) {

            if (auth()->user()->role == 'user') {
                return redirect()->route('menu.index');
            }
        }
        return redirect()->back()->withErrors([
            'email' => 'email dan password salah atau tidak terdaftar'
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
    public function forgotpassword()
    {
        return view('auth.forgot-password');
    }
    public function forgotpassword_store(Request $request)
    {
        $request->validate([ 'email'=> 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email'=>__($status)]);
    }
    public function resetpassword_token(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    public function resetpassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ],[
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'minimal password 8 '
        ]);

        $status = Password::reset(
            $request->only( 'password', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('user.index')->with('status',  __($status))
        : back()->withErrors(['email'=> __($status)]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ],[
            'name.required' => 'Name Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'confirm_password.required' => 'Konfirmasi Password wajib diisi',
            'confirm_password.same' => 'Konfirmasi Password harus sama dengan Password',
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
