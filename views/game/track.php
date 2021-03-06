<?php

/* @var $this yii\web\View */
/* @var $model app\models\Game */
/* @var $form yii\widgets\ActiveForm */

use app\assets\TrackAppAsset;

TrackAppAsset::register($this);
?>
<div id="container-track">
    <div class="row">
        <div class="col-xs-6">
            <p class="text-center">Комманда A</p>
            <p class="text-center">
                <?= \yii\helpers\Html::a($model->playerA->lastname, null, ['class' => 'btn btn-lg btn-success do-goal', 'user-id' => $model->playerA->id, 'game-id' => $model->id])?>
            </p>
            <p class="text-center">
                <?= \yii\helpers\Html::a('Автогол', null, ['class' => 'btn btn-danger btn-xs do-goal autogoal', 'user-id' => $model->playerA->id, 'game-id' => $model->id])?>
            </p>


        </div>
        <div class="col-xs-6">
            <p class="text-center">Комманда B</p>
            <p class="text-center">
                <?= \yii\helpers\Html::a($model->playerC->lastname, null, ['class' => 'btn btn-lg btn-primary do-goal', 'user-id' => $model->playerC->id, 'game-id' => $model->id])?>

            </p>
            <p class="text-center">
                <?= \yii\helpers\Html::a('Автогол', null, ['class' => 'btn btn-danger btn-xs do-goal autogoal', 'user-id' => $model->playerC->id, 'game-id' => $model->id])?>
            </p>

        </div>
    </div>
    <div class="row" style="margin-top: 2em;">
        <div class="col-xs-6">
            <?php if ($model->playerB): ?>
                <p class="text-center">
                    <?= \yii\helpers\Html::a($model->playerB->lastname, null, ['class' => 'btn btn-lg btn-success do-goal', 'user-id' => $model->playerB->id, 'game-id' => $model->id])?>
                </p>
                <p class="text-center">
                    <?= \yii\helpers\Html::a('Автогол', null, ['class' => 'btn btn-danger btn-xs do-goal autogoal', 'user-id' => $model->playerB->id, 'game-id' => $model->id])?>
                </p>
            <?php endif; ?>
        </div>
        <div class="col-xs-6">
            <?php if ($model->playerB): ?>
                <p class="text-center">
                    <?= \yii\helpers\Html::a($model->playerD->lastname, null, ['class' => 'btn btn-lg btn-primary do-goal', 'user-id' => $model->playerD->id, 'game-id' => $model->id])?>
                </p>
                <p class="text-center">
                    <?= \yii\helpers\Html::a('Автогол', null, ['class' => 'btn btn-danger btn-xs do-goal autogoal', 'user-id' => $model->playerD->id, 'game-id' => $model->id])?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-1 col-xs-12 col-xs-offset-0 events" id="container-events">
    </div>
</div>
<?= \yii\bootstrap\Button::widget([
    'label' => 'Повторить матч',
    'tagName' => 'a',
    'options' => [
        'class' => 'btn btn-lg btn-primary',
        'href' => \yii\helpers\Url::to(['game/repeat', 'id' => $model->id]),
    ],
]) ?>