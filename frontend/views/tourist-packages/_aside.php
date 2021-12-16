<?php 

use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

$cat_selected = isset(Yii::$app->request->get()['sub_type_id']) ? Yii::$app->request->get()['sub_type_id'] : '0';
$star_rating = isset(Yii::$app->request->get()['star_rating']) ? Yii::$app->request->get()['star_rating'] : '0';
$cat = \frontend\models\PackagesSubType::find()->orderBy(['name' => SORT_ASC])->all();

?>

<ul class="list-group">
    <?php foreach ($cat as $c): ?>
        <?php $count = \frontend\models\TouristPackages::find()->where(['sub_type_id' => $c->id])->count(); ?>
        <a class="text-decoration-none" href="/frontend/web/tourist-packages/index?sub_type_id=<?= $c->id ?>&star=<?= $star_rating ?>">
            <li class="list-group-item d-flex justify-content-between <?= $c->id == $cat_selected ? 'bg-success text-white' : 'text-gray' ?>">
                <span><i class="fas <?= $c->icon->name ?> mr-2"></i> <?= $c->name ?> (<?= $count ?>)</span>
                <i class="fas fa-angle-right"></i>
            </li>
        </a>
    <?php endforeach ?>
</ul>



<ul class="list-group mt-3 mb-3">
    <li class="list-group-item text-gray pb-0">
        <p class="w-100">
            <i class="fas fa-cog mr-2"></i> <span class="font-weight-bold-2">Filters</span> 
            <a href="/frontend/web/tourist-packages/index?star_rating=0&sub_type_id=<?= $cat_selected ?>" class="float-right text-gray"><i class="fas fa-redo"></i></a>
        </p>
        <hr class="w-100">
        <p class="mt-2">Rating</p>
    </li>
    <?php for ($i=5; $i > 0; $i--): ?>
        <li class="list-group-item d-flex justify-content-between text-gray ">
            <a href="/frontend/web/tourist-packages/index?star_rating=<?= $i ?>&sub_type_id=<?= $cat_selected ?>">
                <div class="custom-control custom-radio" style="height:2px">
                    <input type="radio" class="custom-control-input" id="<?= "start_$i" ?>" name="star_rating" <?= $star_rating == $i ? 'checked' : '' ?> value="<?= $i ?>">
                    <label class="custom-control-label" for="<?= "start_$i" ?>">
                    <?= StarRating::widget([
                        'name' => 'star_rating--',
                        'value' => $i,
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'theme' => 'krajee-uni',
                            'filledStar' => '<i class="far fa-star"></i>',
                            'emptyStar' => '<i class="far fa-star"></i>',
                            ]
                        ]);
                     ?> 
                  </label>
                </div>
            </a>
        </li>
    <?php endfor ?>
</ul>


<script>
    setTimeout(function(){
        $('input[type=radio][name=star_rating]').change(function() {
            // alert(this.value);
            window.location = '/frontend/web/tourist-packages/index?star_rating='+this.value+'&sub_type_id='+<?= $cat_selected ?>;
        });
    },500)
</script>