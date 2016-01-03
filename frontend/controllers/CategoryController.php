<?php

namespace frontend\controllers;

use common\models\Category;
use yii\web\Controller;

class CategoryController extends \yii\web\Controller
{
	public function actionView($id)
    {
        $categoryModel = new Category();
        $category = $categoryModel->getCategory($id);

        return $this->render('index', [
            'category' => $category,
            'posts' => $category->getPosts(),
            'categories' => $categoryModel->getCategories()
        ]);
    }

}
