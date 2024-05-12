<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Goods\CreateGoodPreviewCoverAction;
use App\Http\Controllers\Controller;
use App\Models\Admin\GoodImages;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsCats;
use App\Models\Admin\GoodsItems;
use App\Services\MenuService\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = GoodsCats::get();
        return view('dashboard.menu.goods.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title_arr = [];
        $desc_arr = [];
        $description_arr = [];

        $item = new Goods();
        foreach (LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale) {
            $title = 'title_'.$locale;
            $description = 'description_'.$locale;
            $desc = 'desc_'.$locale;

            $item[$title] = $request[$title];
            $item[$description] = $request[$description];
            $item[$desc] = $request[$desc];

        }

        $item->category = $request->category;
        $item->order = Goods::query()->where('category', $request->category)->count() + 1;
        $item->save();


        return redirect('/goods/'.$item->id.'/edit');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = MenuService::getGoodItem($id);
        return view('dashboard.menu.goods.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $request;
    }


    public function update_good(Request $request, string $id)
    {
        $item = Goods::find($id);

        if($request->file){

            if($item->picture){
                Storage::disk('public')->delete($item->picture);
                $item->picture = '';
            }
            $path = $request->file->store('/goods_images', 'public');
            $item->picture = $path;
        }
        foreach (LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale) {
            $title = 'title_'.$locale;
            $description = 'description_'.$locale;
            $desc = 'desc_'.$locale;

            $item[$title] = $request[$title];
            $item[$description] = $request[$description];
            $item[$desc] = $request[$desc];

        }
        $item->save();

        if($request->file){
            (new CreateGoodPreviewCoverAction($item, 640, 480))->handle();
        }
        if($request->goodsItems){
            foreach ($request->goodsItems as $gItem) {
                $gooItem = GoodsItems::find($gItem['id']);
                foreach (LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale) {
                    $title = 'title_'.$locale;
                    $gooItem[$title] = $gItem[$title];
                    $desc = 'desc_'.$locale;
                    $gooItem[$desc] = $gItem[$desc];
                }
                $gooItem->weight = $gItem['weight'];
                $gooItem->weightKind = $gItem['weightKind'];
                $gooItem->price = str_replace(',', '.', $gItem['price']);
                $gooItem->save();
            }
        }
        return redirect()->back();
    }


    public function remove_goods_photo(string $id)
    {
        $item = Goods::find($id);

        if($item->picture){
            Storage::disk('public')->delete($item->picture);
            $item->picture = '';
            $item->save();
        }


        foreach (GoodImages::query()->where('good_id', $id)->get() as $img){
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }

        // remove folder
        if (File::exists('storage/goods/'.$id)) File::deleteDirectory('storage/goods/'.$id);

        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




    public function order_top(string $category, string $order){
        $catToRight = Goods::where('order', $order - 1)->where('category', $category)->first();
        $catToLeft = Goods::where('order', $order)->where('category', $category)->first();
        $catToRight->order = $order;
        $catToRight->save();
        $catToLeft->order = $order - 1;
        $catToLeft->save();

        return redirect()->back();
    }
    public function order_bottom(string $category, string $order){
        $catToLeft = Goods::where('order', $order + 1)->where('category', $category)->first();
        $catToRight = Goods::where('order', $order)->where('category', $category)->first();
        $catToRight->order = $order + 1;
        $catToRight->save();
        $catToLeft->order = $order;
        $catToLeft->save();

        return redirect()->back();
    }
    public function show_item(string $id, string $show_flag)
    {
        $cat = Goods::find($id);
        $cat->show = $show_flag;
        $cat->save();

        return redirect()->back();
    }


    public function destroy2(string $id)
    {
        $good = Goods::find($id);

        if($good->picture){
            Storage::disk('public')->delete($good->picture);
        }



        foreach (GoodImages::query()->where('good_id', $id)->get() as $img){
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }

        // remove folder
        if (File::exists('storage/goods/'.$id)) File::deleteDirectory('storage/goods/'.$id);

        $good->delete();
        $i=1;
        $goods = Goods::orderBy('order')->where('category', $good->category)->get();
        foreach ($goods as $item){
            $it=Goods::find($item->id);
            $it->order = $i;
            $i++;
            $it->save();
        }


        return redirect()->route('category.show', $good->category);
    }
}
