<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteriorRows extends Model
{
    use HasFactory;

    protected $fillable = [
        'interior_id',
        'path',
        'height',
        'width'
    ];
}
