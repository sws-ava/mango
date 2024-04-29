<?php

namespace App\Actions\Gallery;

use App\Actions\IAction;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryRows;
use Intervention\Image\ImageManager;

final class CreateGalleryScaleAction implements IAction

{
    public function __construct(
        private readonly Gallery $gallery,
    )
    {
    }

    public function handle(): void
    {
        $path =  'gallery/'.$this->gallery->id.'/'.$this->gallery->id.'.jpg';

        $image = ImageManager::imagick()->read('storage/'.$this->gallery->path);
        $image->scaleDown(height:600);
        $image->toJpeg()->save('storage/'.$path);

        GalleryRows::query()->create([
            'path' => $path,
            'gallery_id' => $this->gallery->id,
            'width' => 1,
            'height' => 1
        ]);
    }

}
