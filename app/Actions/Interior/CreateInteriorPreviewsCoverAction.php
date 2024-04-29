<?php

namespace App\Actions\Interior;

use App\Actions\IAction;
use App\Models\Admin\Interior;
use Intervention\Image\ImageManager;

final class CreateInteriorPreviewsCoverAction implements IAction

{
    public function __construct(
        private readonly Interior $interior,
    )
    {
    }

    public function handle(): void
    {
        (new CreateInteriorPreviewCoverAction($this->interior,460,460))->handle();
        (new CreateInteriorPreviewCoverAction($this->interior,456,336))->handle();
        (new CreateInteriorPreviewCoverAction($this->interior,426,662))->handle();
    }
}
