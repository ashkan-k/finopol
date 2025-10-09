<?php

namespace App\Models;

use App\Http\Traits\Searchable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'file',
        'status',
        'ticket_number',
        'is_read',
    ];

    protected $appends = [
        'created_at_from_now',
        'status_display',
        'status_color',
        'text_row',
    ];

    public function get_status()
    {
        if ($this->status == 'waiting') {
            return 'در انتظار';
        } elseif ($this->status == 'answered') {
            return 'پاسخ داده شده';
        }
        return 'بسته';
    }

    public function get_status_class()
    {
        if ($this->status == 'waiting') {
            return 'waiting';
        } elseif ($this->status == 'answered') {
            return 'success';
        }
        return 'new';
    }

    public function getCreatedAtFromNowAttribute()
    {
        return Verta::instance($this->created_at)->formatDifference();
    }

    public function getStatusDisplayAttribute()
    {
        return $this->get_status();
    }

    public function getStatusColorAttribute()
    {
        return $this->get_status_class();
    }

    public function getTextRowAttribute()
    {
        $cleanDescription = preg_replace('/<a(.*?)>(.*?)<\/a>/', '$2', strip_tags($this->text, '<a>'));
        $cleanDescription = str_replace('&zwnj;', '', $cleanDescription);
        $cleanDescription = preg_replace('/[\x{200B}-\x{200F}]/u', '', $cleanDescription);

        return $cleanDescription ?: '---';
    }

    public function get_file()
    {
        return $this->file ?? 'https://www.hardiagedcare.com.au/wp-content/uploads/2019/02/default-avatar-profile-icon-vector-18942381.jpg';
    }

    protected static function newFactory()
    {
        return \Modules\Ticket\Database\factories\TicketFactory::new();
    }

    public function scopeChangeStatus($query, $new_status)
    {
        $query->update(['status' => $new_status]);
    }

    public function scopeFindByTicketNumber($query, $ticket_number)
    {
        return $query->where('ticket_number', $ticket_number)->firstOrFail();
    }

    public function save(array $options = [])
    {
        if (!$this->ticket_number) {
            $last_ticket = Ticket::latest()->first();
            if ($last_ticket) {
                $this->ticket_number = intval($last_ticket->ticket_number) + 1;
            } else {
                $this->ticket_number = 10000;
            }
        }

        return parent::save($options);
    }

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(TicketAnswer::class, 'ticket_id');
    }
}
