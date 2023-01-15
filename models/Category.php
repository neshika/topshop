<?php
namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord{

    //если класс не одноименный с таблицей, возвращает название таблицы
    public static function tableName()
    {
        return 'category'; 
    } 

    //создаем связь между таблицами. Много продуктов в 1 категории
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

}