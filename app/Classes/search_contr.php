<?php

declare(strict_types = 1);

class Searchcontrol extends Searchmodel{
    public function isInputEmpty(string $search){
        if(empty($search)){

            return true;
        }
        else{
            return false;
        }
    }
}