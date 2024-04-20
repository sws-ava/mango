<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blocks;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ua = Blocks::where('locale', 'ua')->first();
        $ru = Blocks::where('locale', 'ru')->first();
        $bg = Blocks::where('locale', 'bg')->first();
        $en = Blocks::where('locale', 'en')->first();
        return view('dashboard.blocks.index', compact('ru', 'ua', 'bg', 'en'));
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
    public function edit(Request $request)
    {
        $showWarning = 0;
        if(isset($request['main']['showWarning'])){
            $showWarning = 1;
        }

        foreach (LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale) {
            $block = Blocks::query()->where('locale', $locale)->first();
            $block->address = $request[$locale]['address'];
            $block->warning = $request[$locale]['warning'];
            $block->email = $request['main']['email'];
            $block->phone1 = $request['main']['phone1'];
            $block->phone1full = $request['main']['phone1full'];
            $block->phone2 = $request['main']['phone2'];
            $block->phone2full = $request['main']['phone2full'];
            $block->workHours = $request['main']['workHours'];
            $block->showWarning = $showWarning;
            $block->save();
        }

        return redirect()->back()->with('succsess');
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
}
