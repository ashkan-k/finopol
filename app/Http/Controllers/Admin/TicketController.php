<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketAnswerRequest;
use App\Http\Traits\Uploader;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    use Uploader;

    public function index(Request $request): View
    {
        $query = Ticket::query()->latest('id');

        if ($q = $request->string('q')->toString()) {
            $query->where(function ($x) use ($q) {
                $x->where('title', 'like', "%{$q}%")
                    ->orWhere('text', 'like', "%{$q}%");
            });
        }
        if ($status = $request->string('status')->toString()) {
            $query->where('status', $status);
        }

        $tickets = $query->paginate(12)->withQueryString();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create(): View
    {
        $users = User::query()->orderBy('name')->get(['id', 'name']);
        return view('admin.tickets.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'status' => ['nullable', 'in:waiting,answered,close'],
        ]);

        $file = $this->UploadFile($request, 'file', 'ticket_files', $data['user_id']);

        Ticket::create(array_merge($data, ['file' => $file]));
        return redirect()->route('dashboard.tickets.index')->with('success', 'تیکت ایجاد شد.');
    }

    public function edit(Ticket $ticket): View
    {
        $users = User::query()->orderBy('name')->get(['id', 'name']);
        return view('admin.tickets.edit', compact('ticket', 'users'));
    }

    public function update(Request $request, Ticket $ticket): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'status' => ['nullable', 'in:waiting,answered,close'],
        ]);

        $file = $this->UploadFile($request, 'file', 'ticket_files', $data['user_id'], $ticket->file);

        $ticket->update(array_merge($data, ['file' => $file]));
        return redirect()->route('dashboard.tickets.index')->with('success', 'تیکت بروزرسانی شد.');
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return redirect()->route('dashboard.tickets.index')->with('success', 'تیکت حذف شد.');
    }

    public function show(Ticket $ticket): View
    {
        // ticket answer page
        $ticket->load('user');

        $last_answer = $ticket->answers()->latest()->first();
        if ((!$last_answer && $ticket->user_id != auth()->id()) || ($last_answer && $last_answer->user_id != auth()->id())) {
            $ticket->update(['is_read' => 1]);
        }

        $answers = $ticket->answers()->with('user')->get();

        return view('admin.tickets.answer', compact('ticket', 'answers'));
    }

    public function store_answer(TicketAnswerRequest $request, Ticket $ticket)
    {
        $file = $this->UploadFile($request, 'file', 'ticket_answers_files', $ticket->user_id);
        $data = [
            'user_id' => auth()->id(),
            'text' => $request->text,
            'file' => $file,
        ];

        $ticket->answers()->create($data);

        if (auth()->id() != $ticket->user_id) {
            $ticket->status = 'answered';

//            $email_pattern = 'user_ticket_answer_submit';
//            $receiver = $ticket->user ? $ticket->user->phone : '---';
//            $ticket_link = route('front.ticket-answers.show', ['locale' => app()->getLocale(), 'ticket' => $ticket->ticket_number]);
        } else {
            $ticket->status = 'waiting';

//            $email_pattern = 'admin_ticket_answer_submit';
//            $receiver = Setting::where('key', 'email')->first()->value;
//            $ticket_link = route('front.ticket-answers.show', ['locale' => app()->getLocale(), 'ticket' => $ticket->ticket_number]);
        }

        $ticket->is_read = 0;
        $ticket->save();

//        $message = [
//            $ticket,
//            sprintf(email_helpers::$EMAIL_PATTERNS[$email_pattern], $ticket->title, $ticket->ticket_number),
//            $ticket_link,
//        ];
//
//        $title = __('Ticket :title (:number)', ['title' => $ticket->title, 'number' => $ticket->ticket_number]);
//        $template = 'email::emails/ticket/ticket_notification';
//
//        try {
//            Mail::to(strip_tags($receiver))->send(new SendEmailMail($receiver, $title, $message, $template));
//        } catch (\Exception $exception) {
//        }

        return redirect()->route('dashboard.tickets.show', $ticket->id)->with('success', 'پاسخ شما با موفقیت ثبت شد.');
    }
}


