<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WalletHistoryExport;
use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class WalletHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = WalletHistory::query()->with(['wallet.user']);

        if ($request->filled('status')) {
            $query->where('type', $request->status);
        }

        $order = $request->get('order', 'desc');
        $query->orderBy('created_at', $order);

        $histories = $query->paginate(20);

        return view('admin.accounting.wallets-histories', compact('histories'));
    }

    public function export(Request $request)
    {
        $query = WalletHistory::query()->with(['wallet.user']);

        if ($request->filled('status')) {
            $query->where('type', $request->status);
        }

        $order = $request->get('order', 'desc');
        $query->orderBy('created_at', $order);

        return Excel::download(new WalletHistoryExport($query), 'wallet_histories_' . now()->format('Y-m-d_H-i-s') . '.xlsx');
    }
}
