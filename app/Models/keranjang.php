<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = [
        'user_id',
        'barangpenjual_id',
        'jumlah',
        'totalHarga',
    ];

    public function penjualLogin()
    {
        return $this->belongsTo(PenjualLogin::class, 'toko_id');
    }

    public function barangPenjual()
    {
        return $this->belongsTo(BarangPenjual::class, 'barangpenjual_id');
    }
}
