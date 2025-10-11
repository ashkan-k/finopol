<?php


namespace App\Enums;


class EnumHelpers
{
    static $FinoServicesCategoryItemsEnum = [
        'authorization' => 'احراز هویت',
        'bank' => 'استعلام بانکی',
        'service' => 'استعلام خدماتی',
    ];

    static $FinoApiCallsStatusItemsEnum = [
        'success' => 'موفق',
        'fail' => 'ناموفق',
        'unknown' => 'نامشخص',
    ];

    static $TicketStatusEnum = ['waiting', 'answered', 'close'];

    static $WalletHistoryTypesEnum = [
        'deposit' => 'واریز',
        'withdraw' => 'برداشت',
    ];

    static $ShahkarInquiryStatusEnum = [
        'waiting' => 'در انتظار',
        'approved' => 'تایید شده',
        'reject' => 'رد شده',
    ];

    static $UserStatusEnum = [
        'waiting' => 'در انتظار',
        'approved' => 'تایید شده',
        'reject' => 'رد شده',
    ];
}
