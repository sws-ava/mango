<?php

namespace App\Actions\Gallery;

use App\Actions\IAction;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryRows;
use Intervention\Image\ImageManager;

final class CreateGalleryPreviewCoverAction implements IAction

{
    public function __construct(
        private readonly Gallery $gallery,
        private readonly int $width = 0,
        private readonly int $height = 0,
    )
    {
    }

    public function handle(): void
    {
        if($this->performanceCondition() === false) return;

        $path =  'gallery/'.$this->gallery->id.'/'.$this->gallery->id.'_'.$this->width.'x'.$this->height.'.jpg';

        $image = ImageManager::imagick()->read('storage/'.$this->gallery->path);
        $image->cover($this->width, $this->height);
        $image->toJpeg()->save('storage/'.$path);

        GalleryRows::query()->create([
            'path' => $path,
            'gallery_id' => $this->gallery->id,
            'width' => $this->width,
            'height' => $this->height,
        ]);

    }

    public function performanceCondition(): bool
    {
        return (
            $this->width
            && $this->height
        );
    }
}
