<?php

namespace App\Services\DynamicTranlateService;

use App\Models\Blocks;
use Illuminate\Support\Facades\App;

class DynamicTranlateService

{
    public function __construct()
    {

    }

    public static function getDynamicTranslates()
    {
        return Blocks::where('locale', App::getLocale())->first();
    }
}
