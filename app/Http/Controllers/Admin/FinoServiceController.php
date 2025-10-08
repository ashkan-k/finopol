<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EnumHelpers;
use App\Http\Controllers\Controller;
use App\Models\FinoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FinoServiceStoreRequest;
use App\Http\Requests\Admin\FinoServiceUpdateRequest;
use Illuminate\View\View;

class FinoServiceController extends Controller
{
    public function index(Request $request): View
    {
        $query = FinoService::query()->latest('id');

        if ($q = $request->string('q')->toString()) {
            $query->where(function($x) use ($q){
                $x->where('title','like',"%{$q}%")
                  ->orWhere('description','like',"%{$q}%")
                  ->orWhere('api_link','like',"%{$q}%");
            });
        }
        if ($cat = $request->string('category')->toString()) {
            $query->where('category',$cat);
        }
        $services = $query->paginate(12)->withQueryString();
        $categories = EnumHelpers::$FinoServicesCategoryItemsEnum;
        return view('admin.finoservices.index', compact('services','categories'));
    }

    public function create(): View
    {
        return view('admin.finoservices.create');
    }

    public function store(FinoServiceStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        FinoService::create($data);
        return redirect()->route('dashboard.finoservices.index')->with('success','سرویس ایجاد شد.');
    }

    public function edit(FinoService $finoservice): View
    {
        return view('admin.finoservices.edit', compact('finoservice'));
    }

    public function update(FinoServiceUpdateRequest $request, FinoService $finoservice): RedirectResponse
    {
        $data = $request->validated();
        $finoservice->update($data);
        return redirect()->route('dashboard.finoservices.index')->with('success','سرویس بروزرسانی شد.');
    }

    public function destroy(FinoService $finoservice): RedirectResponse
    {
        $finoservice->delete();
        return redirect()->route('dashboard.finoservices.index')->with('success','سرویس حذف شد.');
    }
}


