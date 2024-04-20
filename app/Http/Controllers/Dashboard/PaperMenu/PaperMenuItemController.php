<?php

namespace App\Http\Controllers\Dashboard\PaperMenu;

use App\Http\Controllers\Controller;
use App\Models\Admin\PaperMenu;
use App\Models\Admin\PaperMenuItem;
use App\Repositories\PaperMenu\PaperMenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PaperMenuItemController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request['files'] as $file) {
            $order_count = PaperMenuItem::query()
                ->where('locale',$request->default_locale)
                ->where('paper_menu_id', $request->id)
                ->count();

            $photo = new PaperMenuItem();
            $photo->paper_menu_id = $request->id;
            $photo->locale = $request->default_locale;
            $photo->path = $file->store('/paper_menu', 'public');
            $photo->order = $order_count + 1;
            $photo->save();
        }

        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = PaperMenuItem::where('id', $id)->first();
        $photo->delete();

        // remove file from server
        Storage::disk('public')->delete($photo->path);

        // reOrder photos
        $photos = PaperMenuItem::
            orderBy('order', 'asc')
            ->where('paper_menu_id', $photo->paper_menu_id)
            ->get();
        $i = 1;
        foreach ($photos as $item) {
            $item->order = $i;
            $item->save();
            $i++;
        }

        return redirect()->back();
    }


    public function destroy_all($menu){
        $items = PaperMenuItem::where('paper_menu_id', $menu)->get();
        foreach ($items as $item) {
            Storage::disk('public')->delete($item->path);
            $item->delete();
        }
        return redirect()->back();
    }

    public function left(string $order)
    {
        $photoToRight = PaperMenu::where('order', $order - 1)->first();
        $photoToLeft = PaperMenu::where('order', $order)->first();
        $photoToRight->order = $order;
        $photoToRight->save();
        $photoToLeft->order = $order - 1;
        $photoToLeft->save();

        return redirect()->back();
    }

    public function right(string $order)
    {
        $photoToLeft = PaperMenu::where('order', $order + 1)->first();
        $photoToRight = PaperMenu::where('order', $order)->first();
        $photoToRight->order = $order + 1;
        $photoToRight->save();
        $photoToLeft->order = $order;
        $photoToLeft->save();

        return redirect()->back();
    }

    public function update_single_menu_item(Request $request)
    {
        if($request['file']){
            $item = PaperMenuItem::query()
                ->where('id', $request->id)
                ->where('order', $request->order)
                ->first();

//            Пока что не удаляем старые файлы. Надо понаблюдать
//            Storage::disk('public')->delete($item->path);

            $item->path = $request['file']->store('/paper_menu', 'public');
            $item->save();

            return redirect()->back();
        }
    }
}
