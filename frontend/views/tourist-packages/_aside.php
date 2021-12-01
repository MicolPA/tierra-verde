<?php 

$cat = \frontend\models\PackagesSubType::find()->orderBy(['name' => SORT_ASC])->all();
 ?>

<ul class="list-group">
    <?php foreach ($cat as $c): ?>
        <?php $count = \frontend\models\TouristPackages::find()->where(['sub_type_id' => $c->id])->count(); ?>
        <a class="text-decoration-none" href="#">
            <li class="list-group-item d-flex justify-content-between text-gray">
                <span><i class="fas <?= $c->icon->name ?> mr-2"></i> <?= $c->name ?> (<?= $count ?>)</span>
                <i class="fas fa-angle-right"></i>
            </li>
        </a>
    <?php endforeach ?>
</ul>