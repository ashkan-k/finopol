<?php

namespace App\Models;

use App\Enums\EnumHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinoService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'icon_svg',
        'price',
        'respond_min_answer_time',
        'api_link',
        'api_guide_json',
    ];

    public function get_category()
    {
        return EnumHelpers::$FinoServicesCategoryItemsEnum[$this->category] ?? '---';
    }
}
