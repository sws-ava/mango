<?php

namespace App\Actions;

use Throwable;

interface IAction
{
    /**
     * @throws Throwable
     */
    public function handle();
}
