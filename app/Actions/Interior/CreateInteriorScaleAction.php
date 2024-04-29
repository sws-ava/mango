<?php

namespace App\Actions\Interior;

use App\Actions\IAction;
use App\Models\Admin\Interior;
use App\Models\Admin\InteriorRows;
use Intervention\Image\ImageManager;

final class CreateInteriorScaleAction implements IAction

{
    public function __construct(
        private readonly Interior $interior,
    )
    {
    }

    public function handle(): void
    {
        $path =  'interior/'.$this->interior->id.'/'.$this->interior->id.'.jpg';

        $image = ImageManager::imagick()->read('storage/'.$this->interior->path);
        $image->scaleDown(height:600);
        $image->toJpeg()->save('storage/'.$path);

        InteriorRows::query()->create([
            'path' => $path,
            'interior_id' => $this->interior->id,
            'width' => 1,
            'height' => 1
        ]);
    }

}
