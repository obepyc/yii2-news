<?php
/**
 * Created by PhpStorm.
 * User: georgy
 * Date: 09.07.14
 * Time: 9:26
 */
use yii\helpers\Html;

/* @var $model common\models\Post */
/* @var \frontend\models\CommentForm $commentForm \;
/* @var TagPost $post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $model->title ?></h1>

<div class="meta">
    <p>Дата публикации: <?= $model->created_at ?> 
    Категория: <?= Html::a($model->cat->name, ['category/view', 'id' => $model->cat->id]) ?>
    </p>
</div>

<div>
    <?= $model->text ?>
</div>