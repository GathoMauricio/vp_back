<?php

use Carbon\Carbon;

if (!function_exists('dateToString')) {

    function dateToString($date)
    {
        $date = new Carbon($date);
        return $date->isoFormat('dddd D \d\e MMMM \d\e\l Y') . '<br>' . $date->hour . ':' . $date->minute . ' Hrs.';
    }
}
