<?php
namespace App\Lib;

trait  Helper {
    public function get(string $var){
        if(property_exists(get_called_class(),$var)){
            return $this->$var;
        }else {
            return false;
        }
    }

    public function set(string $var,$value){
        if(property_exists(get_called_class(),$var)){
            $this->$var = $value;
            return true;
        } else {
            return false;
        }
    }
}
