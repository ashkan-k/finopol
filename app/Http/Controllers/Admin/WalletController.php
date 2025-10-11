<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WalletHistoryExport;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $query = Wallet::query()->with(['user']);

        if ($request->filled('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->user}%");
            });
        }
        if ($request->filled('phone')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('phone', 'like', "%{$request->phone}%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $wallets = $query->paginate(20);

        return view('admin.accounting.wallets', compact('wallets'));
    }

    public function export(Request $request)
    {
        $query = Wallet::query()->with('user');

        if ($request->filled('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->user}%");
            });
        }
        if ($request->filled('phone')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('phone', 'like', "%{$request->phone}%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return Excel::download(new WalletHistoryExport($query), 'wallets_' . now()->format('Y-m-d_H-i-s') . '.xlsx');
    }
}
