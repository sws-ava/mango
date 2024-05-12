<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsItems extends Model
{
    use HasFactory;
    protected $table = 'goods_items';

    protected $fillable = [
        'title_ru',
        'title_ua',
        'desc_ru',
        'desc_ua',
        'item',
        'show',
        'weight',
        'weightKind',
        'price',
        'order'
    ];
}
