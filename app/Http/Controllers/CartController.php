<?php

namespace App\Http\Controllers;

use App\Services\DynamicTranlateService\DynamicTranlateService;
use App\Services\PageService\PageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index()
    {
        $translates = DynamicTranlateService::getDynamicTranslates();

        return view('cart', compact('translates'));
    }
}
