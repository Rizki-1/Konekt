<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class userOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangpenjual_id',
        'jumlah',
        'toko_id',
        'user_id',
        'foto',
        'metodepembayaran',
        'nomer_antrian',
        'catatan',
        'keterangan',
        'totalharga',
        'adminstatus',
        'pembelianstatus'
    ];

    public function penjual(): BelongsTo
    {
        return $this->belongsTo(barangpenjual::class);
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(ulasan::class);
    }
}
