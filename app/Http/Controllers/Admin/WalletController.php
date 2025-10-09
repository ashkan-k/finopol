<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index(Request $request)
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

        // Parse Jalali (Persian) input and convert to Gregorian datetimes
        $fromJ = $request->string('range_from')->toString();
        $toJ = $request->string('range_to')->toString();

        // Use date-only comparisons to avoid timezone/time issues
        if ($fromJ) {
            $fromG = Verta::parse($fromJ)->toCarbon();
            $query->where('created_at', '>=', $fromG->startOfDay());
        }
        if ($toJ) {
            $toG = Verta::parse($toJ)->toCarbon();
            $query->where('created_at', '<=', $toG->startOfDay());
        }

        $wallets = $query->paginate(20);

        return view('admin.accounting.wallets', compact('wallets'));
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
