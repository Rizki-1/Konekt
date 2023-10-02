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
        'pembelianstatus',
        'tujuanpembayaran'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penjual(): BelongsTo
    {
        return $this->belongsTo(barangpenjual::class, 'barangpenjual_id');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(ulasan::class);
    }

    public function pengembaliandana(): HasMany
    {
        return $this->hasMany(pengembaliandana::class);
    }
        public function barangpenjual()
    {
        return $this->belongsTo(barangpenjual::class, 'barangpenjual_id');
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(penjuallogin::class, 'toko_id');
    }
    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(penjuallogin::class, 'penjual_id');
    }

    public function adminMetodePembayaran(): BelongsTo
    {
        return $this->belongsTo(adminmetodepembayaran::class, 'tujuanpembayaran');
    }


}
