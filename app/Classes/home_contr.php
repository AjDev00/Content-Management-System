<?php

declare(strict_types = 1);

class Homecontrol extends Homemodel{
    public function isInputEmpty(string $posts){
        if(empty($posts)){

            return true;
        }
        else{
            return false;
        }
    }
}