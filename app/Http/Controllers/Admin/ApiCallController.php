<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EnumHelpers;
use App\Http\Controllers\Controller;
use App\Models\ApiCall;
use App\Models\FinoService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiCallController extends Controller
{
    public function index(Request $request): View
    {
        $query = ApiCall::query()->with(['finoService']);

        if ($status = $request->string('status')->toString()) {
            $query->where('status', $status);
        }
        if ($serviceId = $request->integer('fino_service_id')) {
            $query->where('fino_service_id', $serviceId);
        }
        if ($range = $request->string('range')->toString()) {
            // expected format like 1404/06/17 - 1404/07/17 (Jalali). We keep raw filter as created_at between two gregorian converted dates if provided via front-end.
            $parts = array_map('trim', explode('-', $range));
            if (count($parts) === 2) {
                $from = $request->string('from_greg')->toString();
                $to = $request->string('to_greg')->toString();
                if ($from && $to) { $query->whereBetween('created_at', [$from.' 00:00:00', $to.' 23:59:59']); }
            }
        }

        $calls = $query->latest('id')->paginate(10)->withQueryString();
        $services = FinoService::query()->orderBy('title')->get(['id','title']);
        $statuses = EnumHelpers::$FinoApiCallsStatusItemsEnum;
        return view('admin.api_calls.index', compact('calls','services','statuses'));
    }
}


