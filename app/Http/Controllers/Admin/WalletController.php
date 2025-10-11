<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
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

        return view('admin.accounting.wallets', compact('histories'));
    }

    public function transactions(Wallet $wallet)
    {
        // Implement transaction list view
        return view('admin.accounting.wallet_transactions', compact('wallet'));
    }

    public function charge(Wallet $wallet)
    {
        // Implement charge wallet view
        return view('admin.accounting.wallet_charge', compact('wallet'));
    }
}
