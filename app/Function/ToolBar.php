<?php

namespace App\Function;

class ToolBar
{
    public static function randPhone(): string
    {
        $str = '8';
        for ($i = 0; $i < 10; $i++) {
            $num = rand(1, 9);
            $str .= $num;
        }

        return $str;
    }


}
