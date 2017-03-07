<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Snippet */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Snippets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'author_id',
            //'name',
            'description:ntext',
            //'content:ntext',
            //'create_date',
            'update_date',
        ],
    ]) ?>
    <textarea readonly id="editor"><?= $model->content?></textarea>
    <script src="/codemirror/mode/<?= $model->codemode ?>/<?= $model->codemode ?>.js"></script>
    <script>
      var myTextarea = document.getElementById('editor')
      var editor = CodeMirror.fromTextArea(myTextarea, {
        lineNumbers: true,
        mode: '<?= $model->codemode ?>',
        theme: 'lesser-dark',
        styleActiveLine: true,
        matchBrackets: true,
        readOnly: true
      });
    </script>
    <?php if (Yii::$app->user->id == $model->author_id): ?>
    <p></p>
    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
  <?php endif; ?>

</div>
