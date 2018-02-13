<?php

if (!function_exists('formatCpf')) {
    function formatCpf($cpf)
    {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
    }
}

if (!function_exists('clearCpf')) {
    function clearCpf($cpf)
    {
        return preg_replace('/\D+/','', $cpf);;
    }
}