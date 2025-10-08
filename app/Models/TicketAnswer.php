<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_id',
        'text',
        'file',
    ];

    protected $appends = [
        'created_at_from_now',
        'text_row',
    ];

    public function getCreatedAtFromNowAttribute()
    {
        return Verta::instance($this->created_at)->formatDifference();
    }

    public function getTextRowAttribute()
    {
        $cleanDescription = preg_replace('/<a(.*?)>(.*?)<\/a>/', '$2', strip_tags($this->text, '<a>'));
        $cleanDescription = str_replace('&zwnj;', '', $cleanDescription);
        $cleanDescription = preg_replace('/[\x{200B}-\x{200F}]/u', '', $cleanDescription);

        return $cleanDescription ?: '---';
    }

    protected static function newFactory()
    {
        return \Modules\Ticket\Database\factories\TicketAnswerFactory::new();
    }

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
