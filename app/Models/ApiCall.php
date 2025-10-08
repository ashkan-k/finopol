<?php

namespace App\Models;

use App\Enums\EnumHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fino_service_id',
        'token',
        'duration',
        'request_code_sent',
        'response_code_received',
        'amount',
        'status',
    ];

    public function get_status()
    {
        return EnumHelpers::$FinoApiCallsStatusItemsEnum[$this->status] ?? '---';
    }

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fino_service()
    {
        return $this->belongsTo(FinoService::class);
    }
}
