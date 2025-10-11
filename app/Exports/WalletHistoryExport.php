<?php

namespace App\Exports;

use App\Models\WalletHistory;
use Hekmatinasser\Verta\Verta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WalletHistoryExport implements FromCollection, WithHeadings, WithMapping
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query->get();
    }

    public function headings(): array
    {
        return [
            'ردیف',
            'نام کاربر',
            'شماره تلفن',
            'روز',
            'زمان',
            'مبلغ',
            'کد پیگیری',
            'وضعیت',
        ];
    }

    public function map($history): array
    {
        return [
            $history->id,
            $history->wallet->user->name ?? '-',
            $history->wallet->user->phone ?? '-',
            Verta::instance($history->created_at)->format('Y/m/d'),
            Verta::instance($history->created_at)->format('H:i'),
            number_format($history->amount),
            $history->tracking_id ?? '-',
            $history->get_type(),
        ];
    }
}