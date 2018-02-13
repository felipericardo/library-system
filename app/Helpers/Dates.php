<?php

use Carbon\Carbon;

if (!function_exists('convertDate')) {
    function convertDate($fromFormat, $toFormat, $date)
    {
        $date = Carbon::createFromFormat($fromFormat, $date);

        return $date->format($toFormat);
    }
}