<div id="square-root-operation" style="margin-left: 20px; margin-top: 7%; text-align:center;">
  <h4 class="mb-3">Square Root Operation - Cost: <?= $params['operation_cost'] ?></h4>
  <form class="needs-validation" novalidate method="POST">
    <div class="row gy-3">

      <div class="col-md-6">
        <label for="value-a" class="form-label">Value A</label>
        <input type="text" class="form-control" id="value-a" name="value_a" placeholder="" pattern="[0-9]+" min="0" required>
        <div class="invalid-feedback">
          Value A is required
        </div>
      </div>
    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Request Operation</button>  
  </form>
</div>