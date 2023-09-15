<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifikasipenjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan_penjual',
        'toko_id_notifikasi',
        'isi_penjual'
    ];
}
