<?php

namespace App\Models;

use App\Enums\EnumHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_id',
        'user_id',
        'fino_service_id',
        'token',
        'duration',
        'request_code_sent',
        'response_code_received',
        'request_data',
        'response_data',
        'amount',
        'status',
    ];

    public function get_status()
    {
        return EnumHelpers::$FinoApiCallsStatusItemsEnum[$this->status] ?? '---';
    }

    private function generateUniqueTrackingId(): string
    {
        do {
            $candidate = Str::random(22) . ':' . Str::random(120);
        } while (ApiCall::where('tracking_id', $candidate)->exists());
        return $candidate;
    }

    public function save(array $options = [])
    {
        if (!$this->tracking_id) {
            $this->tracking_id = (string) Str::uuid();
        }

        return parent::save($options);
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
