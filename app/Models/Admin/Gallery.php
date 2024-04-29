<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';

    protected $fillable = [
        'width',
        'height',
        'path',
        'order'
    ];

    public function rows()
    {
        return $this->hasMany(GalleryRows::class);
    }
}
