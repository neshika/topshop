<?php

namespace app\components;


use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget{

    public $tpl; //Тип шаблона
    public $data; //все записи катергий из бд
    public $tree; // строит из массива, массив дерева
    public $menuHtml; //готовый код в зависимости от шаблона 


     public function init(){
        parent::init(); //подключаем основной инит.

        if($this->tpl === null){ // если пользователь ничего не передал, то пишет "Меню" (по умолчанию)
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';  //menu.php
     }

    public function run(){
       //$this->data = Category::find()->all(); //возвращает все данные из Категории  получаем объект
       $this->data = Category::find()->indexBy('id')->asArray()->all(); //возвращает все данные из Категории  получаем массив(asArray()) индексы наврны номеру индекса в массиве (indexBy('id')) 
       $this->tree = $this->getTree();
       $this->menuHtml = $this->getMenuHtml($this->tree);
       
       return $this->menuHtml;
    }

    //проходит по массиву и строит дерево
    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
            $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;

        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);

        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start(); //не выводим на экран, а буферизируем
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}



