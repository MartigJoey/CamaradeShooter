<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persons */
/* @var $form yii\widgets\ActiveForm */
$dataprovider = (new \app\models\OfficesSearch())->search(null);

$lstOffices = yii\helpers\ArrayHelper::map($dataprovider->getModels(),'id','label');

$dataprovider = (new \app\models\CompetencesSearch())->search(null);

$lstCompetences = yii\helpers\ArrayHelper::map($dataprovider->getModels(),'id','domaine');

?>

<div class="persons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?php
        echo $form->field($model, 'offices_id')->dropDownList($lstOffices);
        
        echo $form->field($model, 'competences')->dropDownList(
            $lstCompetences,
            [
                'multiple' => 'multiple',
            ]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
