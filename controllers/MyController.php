<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller{
    public function actionIndex($id = null){
        $hi = "Привет мир";
        $names = ['Ivanov', 'Petrov', 'Sidorov'];
        return $this->render('index', compact('hi','names','id'));
    }

}