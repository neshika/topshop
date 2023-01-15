<?php
namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord{

    //если класс не одноименный с таблицей, возвращает название таблицы
    public static function tableName()
    {
        return 'product'; 
    } 

    //создаем связь между таблицами. 1 продукт имеет только 1 категорию
    public function getCategory()
    {
       return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

}