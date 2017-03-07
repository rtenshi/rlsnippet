<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Codemode */

$this->title = 'Create Codemode';
$this->params['breadcrumbs'][] = ['label' => 'Codemodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codemode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
