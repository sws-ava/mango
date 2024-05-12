<?php

namespace App\Console\Commands\tmp;

use App\Actions\Document\DocumentDeliveryOrder\DocumentDeliveryOrderCreateOrderInLogsisAction;
use App\Http\Controllers\Dashboard\GoodsController;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsCats;
use App\Models\Admin\GoodsItems;
use App\Models\Admin\Interior;
use App\Models\DocumentDeliveryOrder;
use App\Models\Measurement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use function PHPUnit\Framework\isNull;

final class Test extends Command
{
    protected $signature = 'test:run';
    public $catId = 0;
    public $itemId = 0;
    public $order = 1;

    public function handle()
    {

        $this->truncateTables();
        $rows = DB::table('temp')->get();

        foreach ($rows as $row){
            if($row->cat_ru && $row->cat_ua){
                $this->catId = 0;
                $cat = GoodsCats::query()->create([
                    'title_ru' => $row->cat_ru,
                    'title_ua' => $row->cat_ua,
                    'description_ru' => $row->desc_ru,
                    'description_ua' => $row->desc_ua,
                ]);

                $cat->update([
                    'order' => $cat->id,
                    'show' => 1
                ]);

                $this->catId = $cat->id;
            }
            if($row->item_ru && $row->item_ua){
                $this->itemId = 0;
                $item = Goods::query()->create([
                    'title_ru' => $row->item_ru,
                    'title_ua' => $row->item_ua,
                    'description_ru' => $row->desc_ru,
                    'description_ua' => $row->desc_ua,
                    'category' => $this->catId,
                    'show' => 1,
                ]);
                $this->itemId = $item->id;
            }

            if($row->variant_ru && $row->variant_ua){
                $item = GoodsItems::query()->create([
                    'title_ru' => $row->variant_ru,
                    'title_ua' => $row->variant_ua,
                    'desc_ru' => $row->desc_ru,
                    'desc_ua' => $row->desc_ua,
                    'item' => $this->itemId,
                    'show' => 1,
                    'weight' => $row->weight,
                    'weightKind' => $row->weight_kind,
                    'price' => $row->price,
                ]);
            }
        }


        $cats = GoodsCats::query()->orderBy('id')->get();

        foreach ($cats as $cat){
            $goods = Goods::query()->orderBy('id')->where('category', $cat->id)->get();
            $order = 1;
            foreach ($goods as $good){
                $good->update([
                    'order' => $order
                ]);
                $order++;
            }
        }

        $items = Goods::query()->orderBy('id')->get();

        foreach ($items as $item){
            $goods = GoodsItems::query()->orderBy('id')->where('item', $item->id)->get();
            $order = 1;
            foreach ($goods as $good){
                $good->update([
                    'order' => $order
                ]);
                $order++;
            }
        }

        $vars = GoodsItems::query()->get();
        foreach ($vars as $var){
            $good = Goods::query()->where('title_ru', $var->title_ru)->first();

//            dd($var->title_ru);
//            dd($var->title_ru == $good->title_ru);
            if(!is_null($good)){
                $good->update([
                    'description_ru' => $var->desc_ru,
                    'description_ua' => $var->desc_ua,
                ]);
            }
        }

        $goods = Goods::query()->get();
        foreach ($goods as $good){
            $good->update([
               'picture' => 'goods/1/1_640x480.jpg'
            ]);
        }


    }

    public function truncateTables()
    {
        DB::table('goods_cats')->truncate();
        DB::table('goods')->truncate();
        DB::table('goods_items')->truncate();
    }

}
