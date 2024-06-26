<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    use HasFactory;
    protected $table = 'interior';

    protected $fillable = [
        'width',
        'height',
        'path',
        'order'
    ];

    public function rows()
    {
        return $this->hasMany(InteriorRows::class);
    }
}
