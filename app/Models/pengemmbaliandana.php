<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pengemmbaliandana extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengembalian_id',
        'user_id',
        'pengembalian_status',
        'foto_pengembalian',
    ];

    public function userOrder()
    {
        return $this->belongsTo(UserOrder::class, 'pengembalian_id', 'id');
    }
}
