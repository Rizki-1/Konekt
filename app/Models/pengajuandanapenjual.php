<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pengajuandanapenjual extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function penjuallogin(): BelongsTo
    {
        return $this->belongsTo(penjuallogin::class,'id');
    }

    public function barangpenjual(): BelongsTo
    {
        return $this->belongsTo(barangpenjual::class, 'barangpenjual_id');
    }

    public function pembayaranpenjual(): BelongsTo
    {
        return $this->belongsTo(pembayaranpenjual::class, 'metodepembayaran_id');
    }
}
