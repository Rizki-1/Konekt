<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dashboardusercontrollers extends Model
{
    use HasFactory;

    protected $fillable = [
        'namamenu_id',
        'jumlahpembelian',
        'totalharga',
        'fotobuktipembayaran',
        'adminstatus',
        'pembelianstatus'
    ];

    public function penjual(): BelongsTo
    {
        return $this->belongsTo(penjual::class, 'namamenu_id');
    }
}
