<?php

namespace App\Policies;

class MapPolicy extends MiscPolicy
{
    protected $model = 'map';
    protected $boosted = true;
}
