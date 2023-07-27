<?php

namespace App\Helpers;

class Helper
{
    public static function CodeGenerator($model, $trow, $length = 5, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();
        $length_without_prefix = $length - (strlen($prefix)+1);
        if(!$data){
            $last_number = 1;
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actual_last_number = ($code/1)*1;
            $last_number = $actual_last_number + 1;
        }

        return $prefix.str_pad($last_number, $length_without_prefix, "0", STR_PAD_LEFT);
    }
}