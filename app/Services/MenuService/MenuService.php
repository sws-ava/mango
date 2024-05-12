<?php

namespace App\Services\MenuService;

use App\Models\Admin\Goods;
use App\Models\Admin\GoodsCats;
use App\Models\Admin\GoodsItems;
use App\Models\Admin\News;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MenuService

{
    public function __construct()
    {

    }

    public static function getCategories()
    {
        $locale = App::getLocale();
        $cats = GoodsCats::orderBy('order', 'asc')->get();
        foreach ($cats as $item) {
            $title = 'title_'.$locale;
            $description = 'description_'.$locale;
            $content = 'content_'.$locale;
            $desc = 'desc_'.$locale;

            $item->title = $item[$title];
            $item->description = $item[$description];
            $item->desc = $item[$desc];
            $item->content = $item[$content];

            $item->goods = self::getGoodsByCat($item->id);
        }
        return $cats;
    }

    public static function getCategory($id)
    {
        $locale = App::getLocale();
        $item = GoodsCats::find($id);

        $title = 'title_'.$locale;
        $description = 'description_'.$locale;
        $content = 'content_'.$locale;

        $item->title = $item[$title];
        $item->description = $item[$description];
        $item->content = $item[$content];

        $item->goods = self::getGoodsByCat($item->id);
        return $item;
    }

    public static function getGoodsByCat($catId)
    {
        $locale = App::getLocale();
        $items = Goods::orderBy('order', 'asc')->where('category', $catId)->get();
        foreach ($items as $item) {
            $title = 'title_'.$locale;
            $description = 'description_'.$locale;
            $desc = 'desc_'.$locale;

            $item->title = $item[$title];
            $item->description = $item[$description];
            $item->desc = $item[$desc];

            $item->goodsItems = self::getGoodsItemsByGoods($item->id);
        }
        return $items;
    }

    public static function getGoodsItemsByGoods($goodId)
    {
        $locale = App::getLocale();
        $items = GoodsItems::orderBy('order', 'asc')->where('item', $goodId)->get();
        $title = 'title_'.$locale;
        $desc = 'desc_'.$locale;
        foreach ($items as $item) {
            $item->title = $item[$title];
            $item->desc = $item[$desc];
        }
        return $items;
    }



    public static function getGoodItem($id)
    {
        $current_locale = App::getLocale();
        $item = Goods::find($id);
        $item->title = $item->title_ru;
        $item->description = $item->description_ru;
        $item->desc = $item->desc_ru;
        $item->content = $item->content_ru;
        if($current_locale === 'ua') {
            if($item->title_ua){
                $item->title = $item->title_ua;
            }else{
                $item->title = $item->title_ru;
            }
            if($item->description_ua){
                $item->description = $item->description_ua;
            }else{
                $item->description = $item->description_ru;
            }
            if($item->content_ua){
                $item->content = $item->content_ua;
            }else{
                $item->content = $item->content_ru;
            }
            if($item->desc_ua){
                $item->desc = $item->desc_ua;
            }else{
                $item->desc = $item->desc_ru;
            }
        }
        $item->goodsItems = self::getGoodsItemsByGoods($item->id);
        return $item;
    }
}
