<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pengajuandanapenjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'penjual_id', 'userOrder_id', 'metodepembayaran_id', 'keterangan_pengajuan', 'tujuan_pengajuan', 'status'
    ];


    public function penjuallogin(): BelongsTo
    {
        return $this->belongsTo(penjuallogin::class,'penjual_id');
    }

    public function userOrder(): BelongsTo
    {
        return $this->belongsTo(userOrder::class, 'userOrder_id');
    }

    public function pembayaranpenjual(): BelongsTo
    {
        return $this->belongsTo(pembayaranpenjual::class, 'metodepembayaran_id');
    }
}
