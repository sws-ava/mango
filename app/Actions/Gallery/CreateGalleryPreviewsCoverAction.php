<?php

namespace App\Actions\Gallery;

use App\Actions\IAction;
use App\Models\Admin\Gallery;

final class CreateGalleryPreviewsCoverAction implements IAction

{
    public function __construct(
        private readonly Gallery $gallery,
    )
    {
    }

    public function handle(): void
    {
        (new CreateGalleryPreviewCoverAction($this->gallery,460,460))->handle();
        (new CreateGalleryPreviewCoverAction($this->gallery,456,336))->handle();
        (new CreateGalleryPreviewCoverAction($this->gallery,426,662))->handle();
    }
}
