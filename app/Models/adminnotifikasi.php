<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminnotifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan_admin',
        'isi_admin',
        'is_read',
    ];
}
