<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EnumHelpers;
use App\Http\Controllers\Controller;
use App\Models\ApiCall;
use App\Models\FinoService;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        // Parse Jalali (Persian) input and convert to Gregorian datetimes
        $fromJ = $request->string('range_from')->toString();
        $toJ = $request->string('range_to')->toString();

        // Use date-only comparisons to avoid timezone/time issues
        if ($fromJ) {
            $fromG = Verta::parse($fromJ)->toCarbon();
            $fromDateStr = $fromG ? $fromG->toDateString() : null;

            $query->where('created_at', '>=', $fromG->startOfDay());
        }
        if ($toJ) {
            $toG = Verta::parse($toJ)->toCarbon();
            $toDateStr = $toG ? $toG->toDateString() : null;

            $query->where('created_at', '<=', $toG->startOfDay());
        }

        $calls = $query->latest('id')->paginate(10)->withQueryString();
        $services = FinoService::query()->orderBy('title')->get(['id', 'title']);
        $statuses = EnumHelpers::$FinoApiCallsStatusItemsEnum;
        return view('admin.api_calls.index', compact('calls', 'services', 'statuses', 'fromDateStr', 'toDateStr'));
    }
}
