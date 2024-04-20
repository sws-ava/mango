<?php

namespace App\Http\Controllers;
use App\Models\Admin\CatalogSetting;
use App\Models\Admin\Gallery;
use App\Models\Admin\Interior;
use App\Models\Admin\News;
use App\Models\Admin\Page;
use App\Models\Admin\PaperMenu;
use App\Repositories\PaperMenu\PaperMenuRepository;
use App\Services\DynamicTranlateService\DynamicTranlateService;
use App\Services\MenuService\MenuService;
use App\Services\NewsService\NewsService;
use App\Services\PageService\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Services\LocaleService\LocaleService;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PageController extends Controller
{
    public function main_page() : View
    {
        $page = PageService::getPageContent(1);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('main_page', compact('translates', 'page'));
    }
    public function menu()
    {
        $catalog_settings = CatalogSetting::query()->find(1);
        $cats = MenuService::getCategories();
        $page = PageService::getPageContent(10);
        $paper_menu = PaperMenuRepository::getItemByLocale(App::getLocale());
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('menu', compact('translates', 'page', 'cats', 'paper_menu', 'catalog_settings'));
    }
    public function delivery() : View
    {
        $page = PageService::getPageContent(4);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('delivery', compact('translates', 'page'));
    }
    public function conception() : View
    {
        $page = PageService::getPageContent(2);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('conception', compact('translates', 'page'));
    }
    public function contacts() : View
    {
        $page = PageService::getPageContent(3);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('conception', compact('translates', 'page'));
    }
    public function gallery() : View
    {
        $images = Gallery::orderBy('order', 'asc')->get();
        foreach ($images as $image) {
            $image->path_lg = str_replace('s.jpg', '.jpg', $image->path);
        }

        $page = PageService::getPageContent(6);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('gallery', compact('translates', 'page', 'images'));
    }
    public function interior() : View
    {
        $images = Interior::orderBy('order', 'asc')->get();
        foreach ($images as $image) {
            $image->path_sm = str_replace('.jpg', 's.jpg', $image->path);
        }

        $page = PageService::getPageContent(7);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('interior', compact('translates', 'page', 'images'));
    }
    public function promotions()
    {
        $page = PageService::getPageContent(8);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('sale', compact('translates', 'page'));
    }
    public function news()
    {
        $page = PageService::getPageContent(9);
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('news', compact('translates', 'page'));
    }



}
