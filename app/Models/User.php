<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\EnumHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'last_name',
        'father_name',
        'national_code',
        'website',
        'bank_card_number',
        'bank_account_number',
        'bank_name',
        'bank_branch',
        'postal_code',
        'emergency_contact_name',
        'emergency_contact_phone',
        'address',
        'description',
        'birth_date',
        'national_card_image',
        'company_name',
        'economic_code',
        'registration_number',
        'registration_date',
        'image_of_the_statute',
        'newspaper_image',
        'CEO_id_card_image',
        'CEO_national_id_card_image',
        'cover_letter_image',
        'shahkar_inquiry_status',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function get_status()
    {
        return EnumHelpers::$UserStatusEnum[$this->status] ?? '---';
    }

    public function get_status_class()
    {
        if ($this->status == 'waiting') {
            return 'waiting';
        } elseif ($this->status == 'approved') {
            return 'success';
        }
        return 'new';
    }

    public function get_shahkar_inquiry_status()
    {
        return EnumHelpers::$UserStatusEnum[$this->shahkar_inquiry_status] ?? '---';
    }

    public function get_shahkar_inquiry_status_class()
    {
        if ($this->shahkar_inquiry_status == 'waiting') {
            return 'waiting';
        } elseif ($this->shahkar_inquiry_status == 'approved') {
            return 'success';
        }
        return 'new';
    }

    //

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
}
