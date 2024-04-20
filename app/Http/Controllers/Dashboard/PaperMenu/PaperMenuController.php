<?php

namespace App\Http\Controllers\Dashboard\PaperMenu;

use App\Http\Controllers\Controller;
use App\Models\Admin\PaperMenu;
use App\Models\Admin\PaperMenuItem;
use App\Repositories\PaperMenu\PaperMenuRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaperMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $items = PaperMenuRepository::getList();
        return view('dashboard.paper_menu.index', compact('items'));
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
        //
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
        $list = PaperMenuRepository::getList();
        $item = PaperMenuRepository::getItem($id);

        return view('dashboard.paper_menu.edit', compact('list', 'item'));
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
        //
    }

    public function update_menu_locale(Request $request, $id)
    {
        $item = PaperMenu::query()->find($id);
        $item->locale = $request->locale;
        $item->save();

        return redirect()->back();
    }
}
