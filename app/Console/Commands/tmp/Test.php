<?php

namespace App\Console\Commands\tmp;

use App\Actions\Document\DocumentDeliveryOrder\DocumentDeliveryOrderCreateOrderInLogsisAction;
use App\Models\Admin\Interior;
use App\Models\DocumentDeliveryOrder;
use App\Models\Measurement;
use Illuminate\Console\Command;
use Intervention\Image\ImageManager;

final class Test extends Command
{
    protected $signature = 'test:run';

    public function handle()
    {
        $photo = Interior::query()->find(1);

        $image = ImageManager::imagick()->read($photo->path);
        dd($image);

// resize to 300 x 200 pixel
        $image->resize(300, 200);

// resize only image height to 200 pixel
        $image->resize(height: 200);
        dd(1);
    }

}
