<?php 

use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

$cat_selected = isset(Yii::$app->request->get()['sub_type_id']) ? Yii::$app->request->get()['sub_type_id'] : '';
$cat = \frontend\models\PackagesSubType::find()->orderBy(['name' => SORT_ASC])->all();
 ?>

<ul class="list-group">
    <?php foreach ($cat as $c): ?>
        <?php $count = \frontend\models\TouristPackages::find()->where(['sub_type_id' => $c->id])->count(); ?>
        <a class="text-decoration-none" href="/frontend/web/tourist-packages/index?sub_type_id=<?= $c->id ?>">
            <li class="list-group-item d-flex justify-content-between <?= $c->id == $cat_selected ? 'bg-success text-white' : 'text-gray' ?>">
                <span><i class="fas <?= $c->icon->name ?> mr-2"></i> <?= $c->name ?> (<?= $count ?>)</span>
                <i class="fas fa-angle-right"></i>
            </li>
        </a>
    <?php endforeach ?>
</ul>



<ul class="list-group">
    <p>Rating</p>
    <a class="text-decoration-none" href="/frontend/web/tourist-packages/index?sub_type_id=<?= $c->id ?>">
        <li class="list-group-item d-flex justify-content-between text-gray ">
            <span><i class="far fa-star"></i> </span>
            <i class="fas fa-angle-right"></i>
        </li>
        <?= StarRating::widget([
                        'name' => 'fecha_entrega1',
                        'value' => 3,
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="fas fa-star"></i>',
                            'emptyStar' => '<i class="fas fa-star"></i>',
                            ]
                        ]);
                     ?> 
    </a>
</ul>
