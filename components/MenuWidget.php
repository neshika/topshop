<?php

namespace app\components;


use yii\base\Widget;

class MenuWidget extends Widget{

    public $tpl;
     public function init(){
        parent::init(); //подключаем основной инит.

        if($this->tpl === null){ // если пользователь ничего не передал, то пишет "Меню" (по умолчанию)
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';  //menu.php
     }

    public function run(){
        return $this->tpl;
    }

}



