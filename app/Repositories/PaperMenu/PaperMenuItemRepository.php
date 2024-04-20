<?php

namespace App\Repositories\PaperMenu;


use App\Models\Admin\PaperMenuItem;

class PaperMenuItemRepository{
    public static function getListByParent($locale)
    {
        $columns =['*'];

        $result = PaperMenuItem::query()
            ->select($columns)
            ->where('locale', $locale)
            ->get();

        return $result;

    }
    public static function getItem($id)
    {
        $columns =[
            'id',
            'title',
            'locale'
        ];

        $result = PaperMenu::query()
            ->select($columns)
            ->find($id)
            ->paper_menu_items;

        return $result;

    }
}
