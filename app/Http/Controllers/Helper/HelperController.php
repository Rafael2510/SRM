<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    function sanitizeString($str)
    {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        $str = preg_replace('/[^a-z0-9]/i', '-', $str);
        $str = preg_replace('/_+/', '_', $str);
        $str = strtolower($str);

        return $str;
    }

    static function parseTime($seconds)
    {
        if(!isset(explode('/', $seconds)[1]))
        {
            $total = $seconds;
            $horas = str_pad(round($total / 3600), 2, 0, STR_PAD_LEFT);
            $minutos = str_pad(round(($total - ($horas * 3600)) / 60), 2, 0, STR_PAD_LEFT);
            $segundos = str_pad(round($total % 60), 2, 0, STR_PAD_LEFT);
            return $horas . ":" . $minutos . ":" . $segundos;
        } else
        {
            return null;
        }
    }
}
