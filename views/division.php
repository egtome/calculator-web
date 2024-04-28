<div id="addition-operation" style="margin-left: 20px; margin-top: 7%; text-align:center;">
  <h4 class="mb-3">Division Operation - Cost: <?= $params['operation_cost'] ?></h4>
  <form class="needs-validation" novalidate method="POST">
    <div class="row gy-3">

      <div class="col-md-6">
        <label for="value-a" class="form-label">Value A</label>
        <input type="text" class="form-control" id="value-a" name="value_a" placeholder="" pattern="[0-9]+" required>
        <div class="invalid-feedback">
          Value A is required
        </div>
      </div>

      <div class="col-md-6">
        <label for="value-b" class="form-label">Value B</label>
        <input type="text" class="form-control" id="value-b" name="value_b" placeholder="" pattern="[0-9]+" min="1" required>
        <div class="invalid-feedback">
          Value B is required
        </div>
      </div>
    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Request Operation</button>  
  </form>
</div>