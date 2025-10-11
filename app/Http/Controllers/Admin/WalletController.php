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

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $order = $request->get('order', 'desc');
        $query->orderBy('created_at', $order);

        $histories = $query->paginate(20);

        return view('admin.accounting.wallets', compact('histories'));
    }
}
