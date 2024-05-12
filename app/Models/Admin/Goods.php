<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    protected $table = 'goods';

    protected $fillable = [
        'title_ru',
        'title_ua',
        'description_ru',
        'description_ua',
        'show',
        'order',
        'category',
        'picture'
    ];

    public function images()
    {
        return $this->hasMany(GoodImages::class, 'good_id', 'id');
    }
}
