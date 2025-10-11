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
            'موجودی',
            'وضعیت',
        ];
    }

    public function map($wallet): array
    {
        return [
            $wallet->id,
            $wallet->user->name ?? '-',
            $wallet->user->phone ?? '-',
            number_format($wallet->balance),
            $wallet->status ? 'فعال' : 'غیرفعال',
        ];
    }
}