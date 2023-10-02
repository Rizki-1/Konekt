<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{

    public $timestamps = true; // Pastikan ini ada
    
    use HasFactory;

    protected $fillable = [
        'keterangan',
        'isi',
        'user_id_notifikasi',
        'is_read',
    ];
}
