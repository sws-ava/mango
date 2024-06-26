<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsCats extends Model
{
    use HasFactory;
    protected $table = 'goods_cats';

    protected $fillable = [
        'title_ru',
        'title_ua',
        'description_ru',
        'description_ua',
        'show',
        'order'
    ];
}
