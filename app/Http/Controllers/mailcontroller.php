<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailcontroller extends Controller
{
    // public function index(Request $request)
    // {
    //     $user = User::where('role', 'penjualnotapprove')->get();
    //     Mail::to('email@gmail.com')->send(new SendEmail($user));
    // }
}
