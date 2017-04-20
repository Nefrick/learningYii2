<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\bootstrap\Html;
$this->title = 'Monster Mash';
$btnClass = 'btn btn-lrg ';
$btnClass .= (date('s')%2) ? 'btn-warning' : 'btn-success';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to Monster Mash!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><?=Html::a('Find Your Match', '/monster', ['class' => $btnClass])?></p>
        <p><?=date('s')%2?></p>
    </div>
</div>

    </div>
</div>
