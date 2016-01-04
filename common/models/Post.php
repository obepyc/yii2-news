<?php

namespace common\models;


use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property integer $catId
 * @property string $title
 * @property string $sText
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Category $cat
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catId', 'created_at', 'updated_at'], 'integer'],
            [['title', 'sText', 'text'], 'required'],
            [['sText', 'text'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catId' => 'Категория',
            'title' => 'Заголовок',
            'sText' => 'Короткая статья',
            'text' => 'Статья',
            'created_at' => 'Добавлена',
            'updated_at' => 'Обновлена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'catId']);
    }

    // Получение всех постов

    public function getPosts()
    {
        return new ActiveDataProvider(['query' => Post::find()->orderBy("id DESC")]);
    }

    // Получение одной записи

    public function getPost($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Стать не найдена.');
        }
    }
}
