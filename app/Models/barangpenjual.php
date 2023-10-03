<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class barangpenjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'namamenu',
        'keterangan_makanan',
        'kategori_id',
        'toko_id',
        'harga',
        'fotomakanan',
        'keterangan_makanan',
        'stok'
    ];

    public function adminkategori(): BelongsTo
    {
        return $this->belongsTo(adminkategori::class, 'kategori_id');
    }

    public function userOrders(): HasMany
    {
        return $this->hasMany(userOrder::class);
    }

    public function penjuallogin(): HasOne
    {
        return $this->hasOne(penjuallogin::class);
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(ulasan::class);
    }
    public function keranjang(): HasMany
    {
        return $this->hasMany(keranjang::class);
    }

    public function isUsed()
    {
    return $this->userOrders()->exists();
    }

    public function pengajuandanapenjual(): HasMany
    {
        return $this->hasMany(pengajuandanapenjual::class);
    }
}
