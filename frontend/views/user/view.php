<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = "$model->first_name $model->last_name";
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    

    <p>
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="bg-white">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
                'status',
                'created_at',
                // 'updated_at',
                // 'verification_token',
                'role.name',
            ],
        ]) ?>
    </div>

</div>
