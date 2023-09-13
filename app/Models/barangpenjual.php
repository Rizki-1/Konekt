<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class barangpenjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'namamenu',
        'kategori_id',
        'harga',
        'fotomakanan',
    ];

    public function adminkategori(): BelongsTo
    {
        return $this->belongsTo(adminkategori::class, 'kategori_id');
    }

    public function userindex(): HasMany
    {
        return $this->hasMany(dashboardusercontrollers::class, 'namamenu_id');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'penjual_id');
    }
}
