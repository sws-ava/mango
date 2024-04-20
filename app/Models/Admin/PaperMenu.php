<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaperMenu extends Model
{
    use HasFactory;

    public function paper_menu_items(): HasMany
    {
        return $this->hasMany(PaperMenuItem::class, 'locale', 'default_locale');
    }

    public function paper_menu_items_by_locale(): HasMany
    {
        return $this->hasMany(PaperMenuItem::class, 'locale', 'locale');
    }
}
