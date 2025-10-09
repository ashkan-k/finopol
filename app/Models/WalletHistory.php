<?php

namespace App\Models;

use App\Enums\EnumHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sms\Helpers\sms_helper;

class WalletHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'amount',
        'type',
        'item_id',
        'item_type',
        'short_report',
    ];

    protected $appends = [
        'type_display',
//        'item_display',
//        'item_status_display',
    ];

    public function getTypeDisplayAttribute()
    {
        return $this->get_type();
    }

    public function getItemDisplayAttribute()
    {
        return $this->get_item();
    }

    public function getItemStatusDisplayAttribute()
    {
        return $this->get_item_status();
    }

    public function get_type()
    {
       return EnumHelpers::$WalletHistoryTypesEnum[$this->type] ?? '---';
    }

    public function get_type_class()
    {
        return $this->type == 'deposit' ? 'success' : 'danger';
    }

    public function get_item()
    {
        switch ($this->item_type){
            case WithdrawalRequest::class:
                return 'برداشت';
            case Payment::class:
                return 'واریز (درگاه پرداخت)';
            case DepositReceipt::class:
                return 'واریز';
            default:
                return '---';
        }
    }

    public function get_item_status()
    {
        if ($this->item){
            switch ($this->item_type){
                case DepositReceipt::class:
                case WithdrawalRequest::class:
                    return $this->item->get_status();
                case Payment::class:
                    return $this->item->status ? 'موفق' : 'ناموفق';
                default:
                    return '---';
            }
        }

        return '---';
    }

    public function get_item_status_class()
    {
        if ($this->item){
            switch ($this->item_type){
                case DepositReceipt::class:
                case WithdrawalRequest::class:
                    return $this->item->get_status_class();
                case Payment::class:
                    return $this->item->status ? 'success' : 'danger';
                default:
                    return '---';
            }
        }

        return '---';
    }

    public function CanSaveShortReportText()
    {
        switch ($this->item_type){
            case DepositReceipt::class:
                return $this->item->status == 'approved';
            case WithdrawalRequest::class:
                return $this->item->status == 'paid';
            case Payment::class:
                return $this->item->status;
            default:
                return false;
        }
    }

    public static function SaveShortReportText($walletHistory)
    {
        if ($walletHistory && $walletHistory->CanSaveShortReportText()){

            switch ($walletHistory->type) {
                case "deposit":
                    $message = sprintf(sms_helper::$SMS_PATTERNS["wallet_history_deposit_user"], number_format($walletHistory->amount) . ' تومان');
                    break;
                case "withdraw":
                    $message = sprintf(sms_helper::$SMS_PATTERNS["wallet_history_withdrawal_user"], number_format($walletHistory->amount) . ' تومان');
                    break;
            }

            $walletHistory->updateQuietly(['short_report' => $message]);

        }
    }

    protected static function newFactory()
    {
        return \Modules\Wallet\Database\factories\WalletHistoryFactory::class;
    }

    //

    //Polymorphic
    public function item()
    {
        return $this->morphTo();
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
