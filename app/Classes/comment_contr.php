<?php

declare(strict_types =1);

class Commentcontrol extends Commentmodel{
    public function isInputEmpty(string $comment_content){
        if(empty($comment_content)){

            return true;
        }
        else{
            return false;
        }
    }
}