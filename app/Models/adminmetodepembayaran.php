<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class adminmetodepembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pembayaran(): HasMany
    {
        return $this->hasMany(userOrder::class, 'tujuanpembayaran');
    }

}
