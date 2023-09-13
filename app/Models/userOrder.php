<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class userOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'namamenu_id',
        'jumlah',
        'foto',
        'keterangan',
        'adminstatus',
        'pembelianstatus'
    ];

    public function penjual(): BelongsTo
    {
        return $this->belongsTo(barangpenjual::class, 'namamenu_id');
    }
}
