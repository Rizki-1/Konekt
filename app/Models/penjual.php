<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'namamenu',
        'kategori',
        'harga',
        'fotomakanan',
    ];

    public function dashboardusercontrollers(): HasMany
    {
        return $this->hasMany(dashboardusercontrollers::class, 'namamenu_id');
    }
}
