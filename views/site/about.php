<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        My name is M Nurul Alam, i'am sudies in STMIK Widya Pratama Majoring Informatics Enginerring.
    </p>

    <code><?= __FILE__ ?></code>
</div>