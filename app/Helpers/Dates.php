<?php

use Carbon\Carbon;

if (!function_exists('convertDate')) {
    function convertDate($fromFormat, $toFormat, $date)
    {
        $date = Carbon::createFromFormat($fromFormat, $date);

        return $date->format($toFormat);
    }
}

if (!function_exists('monthText')) {
    function monthText($month)
    {
        $months = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];

        return $months[intval($month)];
    }
}