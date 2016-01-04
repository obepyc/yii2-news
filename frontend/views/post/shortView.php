<?php
/**
 * Created by PhpStorm.
 * User: georgy
 * Date: 09.07.14
 * Time: 9:26
 */
use common\models\Post;
use yii\helpers\Html;

/* @var $model common\models\Post */
/* @var TagPost $postTag */
?>

<h1><?= $model->title ?></h1>

<div class="meta">
    <p>Дата публикации: <?= date('Y-m-d H:i:s',$model->created_at) ?> Категория: <?= Html::a($model->cat->name, ['category/view', 'id' => $model->cat->id]) ?> </p>
</div>

<div class="content">
    <?= $model->sText ?>
</div>


<?= Html::a('Читать далее', ['post/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
