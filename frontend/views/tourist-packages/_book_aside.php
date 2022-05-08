<?php 

use yii\widgets\ActiveForm;

 ?>

<?php $form = ActiveForm::begin(['action' => 'book', 'method' => 'post']); ?>
  <div class="card">
    <h5 class="card-header bg-secondary text-center text-white h3 font-weight-normal">- Booking -</h5>
    <div class="card-body">
      <div class="row">
        <?php $all_locations = \frontend\models\TouristPackagesPayments::find()
        ->where(['tourist_packages_id' => $model->id])->select(['location_id'])->distinct()->all(); ?>
        <div class="col-md-12">
          <div class="form-group">
            <label>Punto de partida</label>
            <select class="form-control" name="location">
              <option value="">Seleccionar...</option>
              <?php foreach ($all_locations as $location): ?>
                <?php $loc = \frontend\models\Location::findOne($location->location_id); ?>

                <?php if ($loc): ?>
                  <option value="<?= $loc->id ?>"><?= $loc->name ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="form-group">
            <label>Select a date</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Select a date</label>
            <input type="text" class="form-control">
          </div>
        </div> -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Adults</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <a class="input-group-text bg-white text-dark text-decoration-none" href="javascript:calculate(-1, 'adults')">-</a>
              </div>
              <input type="text" class="form-control adults text-center bg-white" name="adults_count" value="0" readonly>
              <div class="input-group-append">
                <a class="input-group-text bg-white text-dark text-decoration-none" href="javascript:calculate(1, 'adults')">+</a>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Children</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <a class="input-group-text bg-white text-dark text-decoration-none" name="adults_count" href="javascript:calculate(-1, 'children')">-</a>
              </div>
              <input type="text" class="form-control children text-center bg-white" name="children_count" value="0" readonly>
              <div class="input-group-append">
                <a class="input-group-text bg-white text-dark text-decoration-none" href="javascript:calculate(1, 'children')">+</a>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="row border-top pt-2 pb-2 w-100">
          <div class="col-md-6">
            <label>Adults</label>
          </div>
          <div class="col-md-6 text-right">
            <label class="adults_amount">0</label>
          </div>
        </div>

        <div class="row border-top pt-2 pb-2 w-100">
            <div class="col-md-6">
              <label>Children</label>
            </div>
            <div class="col-md-6 text-right">
              <label class="children_amount">0</label>
            </div>
        </div>


        <div class="row border-top pt-2 pb-2 w-100">
            <div class="col-md-6">
              <label class="font-weight-bold h4">Total Cost</label>
            </div>
            <div class="col-md-6 text-right">
              <label class="amount font-weight-bold h4">0</label>
            </div>
        </div>

        <div class="row mt-2">
          <input type="submit" class="btn btn-success btn-block" value="BOOK NOW">
        </div>
       
        <input type="hidden" name="package" class="package" value="<?= $model->id ?>">
        <input type="hidden" name="children_amount" class="amount_childen_input" value="0">
        <input type="hidden" name="adults_amount" class="amount_adults_input" value="0">

      </div>
    </div>
  </div>
<?php ActiveForm::end(); ?>


