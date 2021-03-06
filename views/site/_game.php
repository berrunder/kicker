<?php
use app\models\Game;

/**
 * @var Game $model
 */
?>
<div class="row game-item">
    <div class="col-md-5">
        <div><?= $model->playerA ? $model->playerA->lastname : '' ?></div>
        <div><?= $model->playerB ? $model->playerB->lastname : '' ?></div>
    </div>
    <div class="col-md-2">
        <?= $model->scoreA ?>-<?= $model->scoreB ?>
    </div>
    <div class="col-md-5">
        <div><?= $model->playerC ? $model->playerC->lastname : '' ?></div>
        <div><?= $model->playerD ? $model->playerD->lastname : '' ?></div>
    </div>
</div>