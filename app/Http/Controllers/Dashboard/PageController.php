<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use App\Models\Admin\SiteImages;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::whereIn('id', [1,2,4,8,9])->get();
        return view('dashboard.pages.index', compact('pages'));
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
    public function edit(string $id): View
    {
        $photos = SiteImages::orderBy('id', 'desc')->get();
        $page = Page::find($id);
        return view('dashboard.pages.edit', compact('page', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        foreach (LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale) {
            $title = 'title_'.$locale;
            $description = 'description_'.$locale;
            $content = 'content_'.$locale;

            $page = Page::find($id);
            $page[$title] = $request[$title];
            $page[$description] = $request[$description];
            $page[$content] = $request[$content];
            $page->save();

        }

        $photos = SiteImages::orderBy('id', 'desc')->get();

        return view('dashboard.pages.edit', compact('page', 'photos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
