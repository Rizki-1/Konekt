<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ulasan extends Model
{
    use HasFactory;


    protected $fillable = [
        'barangpenjual_id',
        'rating',
        'komentar',
        'username'
    ];


    public function barangpenjual(): BelongsTo
    {
        return $this->belongsTo(barangpenjual::class);
    }
   
}
