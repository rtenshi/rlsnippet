<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Codemode;
/* @var $this yii\web\View */
/* @var $model app\models\Snippet */
/* @var $form yii\widgets\ActiveForm */
//$codemode = Codemode::findBySql('SELECT * from `codemode`');
$codemode = Codemode::find()->all();

$codes = [];
foreach($codemode as $type) {
  $codes[$type['slug']] = $type['name'];
}
?>

<div class="snippet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo Html::activeHiddenInput($model, 'author_id', ['value' => Yii::$app->user->id]);;
         //echo  $form->field($model, 'author_id')->textInput(['value' => Yii::$app->user->id]) ?>
    <?php //$form->field($model, 'author_id', ['value' => ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?php //$form->field($model, 'private')->checkbox(['selected' => $model->private ? 'selected' : 'false', 'value' => 1]); ?>
    <div class="">
      <div class="row">
        <div class="col-xs-6">
          <?= $form->field($model, 'private')->DropDownList(['0' => 'Public', '1' => 'Private']) ?>
        </div>
        <div class="col-xs-6">
          <?= $form->field($model, 'codemode')->DropDownList($codes); ?>
        </div>
      </div>
    </div>

    <?= $form->field($model, 'content')->textarea(['rows' => 15]) ?>

    <?php // $form->field($model, 'create_date')->textInput() ?>

    <?php  //$form->field($model, 'update_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="/codemirror/mode/<?= $model->codemode ?>/<?= $model->codemode ?>.js"></script>
<script>
  var myTextarea = document.getElementById('snippet-content')
  var editor = CodeMirror.fromTextArea(myTextarea, {
    lineNumbers: true,
    mode: '<?= $model->codemode ?>',
    theme: 'lesser-dark',
    styleActiveLine: true,
    matchBrackets: true
  });
  editor.on("change",function(cm,change){
      window.setTimeout(function(){
        for(var i = 0; i < values.length; i++){
          $(values[i].name.split(":")[0].replace("?",theme)).css(values[i].name.split(":")[1], values[i].val);
        }
      }, delay);
  });
  $("#snippet-codemode").change(function(){
    editor.setOption("mode", $("#snippet-codemode").val());
  });
</script>
