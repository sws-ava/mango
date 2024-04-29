<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryRows extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'path',
        'height',
        'width'
    ];
}
