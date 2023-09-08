<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class penjuallogin extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'nama_toko',
        'foto_toko',
        'notlp',
        'alamat_toko',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
