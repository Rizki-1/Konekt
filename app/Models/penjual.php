<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'namamenu',
        'kategori_id',
        'harga',
        'fotomakanan',
    ];

    public function admink(): BelongsTo
    {
        return $this->belongsTo(admink::class, 'kategori_id');
    }

    public function dashboardusercontrollers(): HasMany
    {
        return $this->hasMany(dashboardusercontrollers::class, 'namamenu_id');
    }
}
