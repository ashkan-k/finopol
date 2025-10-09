<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'balance',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Wallet\Database\factories\WalletFactory::new();
    }

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->hasMany(WalletHistory::class);
    }
}
