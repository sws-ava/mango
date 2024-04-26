<?php

namespace App\Services\PageService;

use App\Models\Admin\Page;
use Illuminate\Support\Facades\App;

class PageService

{
    public function __construct()
    {

    }

    public static function getPageContent($id)
    {
        $title = 'title_'.App::getLocale();
        $description = 'description_'.App::getLocale();
        $content = 'content_'.App::getLocale();

        $page = Page::select('id', 'slug', $title, $description, $content)->find($id);

        $page->title = $page[$title];
        $page->description = $page[$description];
        $page->content = $page[$content];

        self::setViewToPage($id);

        return $page;
    }

    public static function setViewToPage($id)
    {
        $page = Page::find($id);
        $page->views = $page->views + 1;
        $page->save();
    }
}
