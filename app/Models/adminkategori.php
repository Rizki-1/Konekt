<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class adminkategori extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function penjual(): HasMany
    {
        return $this->hasMany(barangpenjual::class, 'kategori_id');
    }
}
