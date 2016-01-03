<?php

namespace frontend\controllers;

use common\models\Category;

use Yii;
use common\models\Post;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;




class PostController extends \yii\web\Controller
{

	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    	$post = new Post();
        $category = new Category();

        return $this->render('index', [
            'posts' => $post->getPosts(),
            'categories' => $category->getCategories()
        ]);
    }

    public function actionView($id)
    {
        $post = new Post();
        return $this->render('view', [
            'model' => $post->getPost($id),
        ]);
    }

}
