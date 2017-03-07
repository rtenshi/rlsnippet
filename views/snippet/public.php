<?php

use yii\helpers\Html;
use yii\grid\GridView;
use amnah\yii2\user\models\User;
use app\models\Codemode;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SnippetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Snippets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
               'attribute' => 'name',
               'format' => 'raw',
               'value' => function ($model, $index, $widget) {
                   return Html::a($model->name, '/snippet/view?id='.$model->id);
               },
            ],
            'description:ntext',
            //'content:ntext',
            // 'create_date',
             'update_date',
             [
                'attribute' => 'codemode',
                'format' => 'raw',
                'label' => 'Type',
                'value' => function ($model, $index, $widget) {
                    $mode = Codemode::findBySql('SELECT * FROM codemode WHERE slug LIKE "'. $model->codemode .'"')->one();
                    return $mode['name'];
                },
             ],
             [
                'attribute' => 'author_id',
                'format' => 'raw',
                'label' => 'Author',
                'value' => function ($model, $index, $widget) {
                    $user = User::findOne($model->author_id);
                    return Html::tag('span', $user->username);
                },
             ],
        ],
    ]); ?>
</div>
