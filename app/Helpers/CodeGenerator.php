<?php

namespace App\Helpers;

if (!function_exists('buatkode')) {
    function buatkode($last_no_register, $format, $length)
    {
        if ($last_no_register == '') {
            $urutan = 1;
        } else {
            $urutan = intval(substr($last_no_register, -$length)) + 1;
        }
        $no_register = $format . str_pad($urutan, $length, '0', STR_PAD_LEFT);
        return $no_register;
    }
}
