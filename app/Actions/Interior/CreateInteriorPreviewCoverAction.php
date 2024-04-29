<?php

namespace App\Actions\Interior;

use App\Actions\IAction;
use App\Models\Admin\Interior;
use App\Models\Admin\InteriorRows;
use Intervention\Image\ImageManager;

final class CreateInteriorPreviewCoverAction implements IAction

{
    public function __construct(
        private readonly Interior $interior,
        private readonly int $width = 0,
        private readonly int $height = 0,
    )
    {
    }

    public function handle(): void
    {
        if($this->performanceCondition() === false) return;

        $path =  'interior/'.$this->interior->id.'/'.$this->interior->id.'_'.$this->width.'x'.$this->height.'.jpg';

        $image = ImageManager::imagick()->read('storage/'.$this->interior->path);
        $image->cover($this->width, $this->height);
        $image->toJpeg()->save('storage/'.$path);

        InteriorRows::query()->create([
            'path' => $path,
            'interior_id' => $this->interior->id,
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
