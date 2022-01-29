<?php


namespace App\Models;


class Custom
{
    public static function sweetAlert($icon,$title){
        return[
            'icon' => $icon,
            'title' => $title
        ];
    }
}
