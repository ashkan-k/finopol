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

    public function get_status_class()
    {
        if ($this->status == 'unknown') {
            return 'waiting';
        } elseif ($this->status == 'success') {
            return 'fail';
        }
        return 'new';
    }

    public function save(array $options = [])
    {
        if (!$this->tracking_id) {
            $this->tracking_id = (string) Str::uuid();
        }

        return parent::save($options);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function finoService()
    {
        return $this->belongsTo(FinoService::class, 'fino_service_id');
    }
}
