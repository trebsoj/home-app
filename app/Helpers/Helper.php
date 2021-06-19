<?php

namespace App\Helpers;

use App\Models\Group;
use http\Client\Request;

class Helper
{
    public static function isMenuActive($group, $segment1, $segment2)
    {
//        return $group->id;
//        return Request::is(Request::segment(1) . '/group/'.$group->id);
        return $segment1=='group' && $segment2==$group->id;

    }
}
