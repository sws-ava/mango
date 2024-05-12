<?php

namespace App\Actions\Goods;

use App\Actions\IAction;
use App\Models\Admin\GoodImages;
use App\Models\Admin\Goods;
use App\Models\Admin\Interior;
use App\Models\Admin\InteriorRows;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

final class CreateGoodPreviewCoverAction implements IAction

{
    public function __construct(
        private readonly Goods $good,
        private readonly int $width = 0,
        private readonly int $height = 0,
    )
    {
    }

    public function handle(): void
    {
        if($this->performanceCondition() === false) return;

        if (!File::exists('storage/goods/'.$this->good->id)){
            Storage::disk('public')->makeDirectory('/goods/'.$this->good->id);
        }


        $path =  'goods/'.$this->good->id.'/'.$this->good->id.'_'.$this->width.'x'.$this->height.'.jpg';

        $image = ImageManager::imagick()->read('storage/'.$this->good->picture);
        $image->cover($this->width, $this->height);
        $image->toJpeg()->save('storage/'.$path);

        GoodImages::query()->create([
            'path' => $path,
            'good_id' => $this->good->id,
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
