<?php

class Juxtaposition
{
    public $leftImage;
    public $rightImage;
    public $id;
    public function saveJuxtaposition($id = null){
        if(!$id){
            $id = $this->id;
        }


    }
}

?>