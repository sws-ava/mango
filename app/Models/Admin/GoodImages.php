<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodImages extends Model
{
    use HasFactory;

    protected $table = 'goods_images';
    protected $fillable = [
        'good_id',
        'path',
        'height',
        'width'
    ];
}
