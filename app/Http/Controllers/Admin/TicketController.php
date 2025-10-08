<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(Request $request): View
    {
        $query = Ticket::query()->latest('id');

        if ($q = $request->string('q')->toString()) {
            $query->where(function($x) use ($q){
                $x->where('title','like',"%{$q}%")
                  ->orWhere('text','like',"%{$q}%");
            });
        }
        if ($status = $request->string('status')->toString()) {
            $query->where('status',$status);
        }

        $tickets = $query->paginate(12)->withQueryString();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create(): View
    {
        $users = User::query()->orderBy('name')->get(['id','name']);
        return view('admin.tickets.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['nullable','integer','exists:users,id'],
            'title' => ['required','string','max:255'],
            'text' => ['required','string'],
            'status' => ['nullable','in:waiting,answered,close'],
        ]);
        Ticket::create($data);
        return redirect()->route('dashboard.tickets.index')->with('success','تیکت ایجاد شد.');
    }

    public function edit(Ticket $ticket): View
    {
        $users = User::query()->orderBy('name')->get(['id','name']);
        return view('admin.tickets.edit', compact('ticket','users'));
    }

    public function update(Request $request, Ticket $ticket): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['nullable','integer','exists:users,id'],
            'title' => ['required','string','max:255'],
            'text' => ['required','string'],
            'status' => ['nullable','in:waiting,answered,close'],
        ]);
        $ticket->update($data);
        return redirect()->route('dashboard.tickets.index')->with('success','تیکت بروزرسانی شد.');
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return redirect()->route('dashboard.tickets.index')->with('success','تیکت حذف شد.');
    }

    public function show(Ticket $ticket): View
    {
        // ticket answer page
        $ticket->load('user');
        return view('admin.tickets.answer', compact('ticket'));
    }
}


