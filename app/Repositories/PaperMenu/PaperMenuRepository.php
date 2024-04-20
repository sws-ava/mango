<?php

namespace App\Repositories\PaperMenu;


use App\Models\Admin\PaperMenu;

class PaperMenuRepository{
    public static function getList()
    {
        $columns =['*'];

        $result = PaperMenu::query()
            ->select($columns)
            ->get();

        return $result;

    }
    public static function getItem($id)
    {
        $columns =['*'];

        $result = PaperMenu::query()
            ->select($columns)
            ->find($id);

        $result->photos = $result->paper_menu_items()->orderBy('order', 'asc')->get();

        return $result;
    }
    public static function getItemByLocale($locale)
    {
        $columns =['*'];

        $result = PaperMenu::query()
            ->select($columns)
            ->where('default_locale', $locale)
            ->first();

        $result->photos = $result
            ->paper_menu_items_by_locale()
            ->orderBy('order', 'asc')
            ->where('locale', $result->locale)
            ->get();

        return $result;
    }
}
