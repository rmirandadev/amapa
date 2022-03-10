<?php

namespace JeroenNoten\LaravelAdminLte\Menu\Filters;

use Illuminate\Support\Facades\Auth;

class SpatieFilter implements FilterInterface
{
    public function transform($item)
    {
        if (isset($item['role']) && ! Auth::user()->hasRole($item['role'])) {
            return false;
        }
        return $item;
    }
}
