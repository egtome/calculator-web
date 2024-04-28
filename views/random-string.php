<div id="random-string-operation" style="margin-left: 20px; margin-top: 7%; text-align:center;">
  <h4 class="mb-3">Square Root Operation - Cost: <?= $params['operation_cost'] ?></h4>
  <form class="needs-validation" novalidate method="POST" onsubmit="return validateForm()">
    <div class="row gy-3">

      <div class="col-md-6">
        <label for="num" class="form-label">Number of strings to generate</label>
        <input type="text" class="form-control" id="num" name="num" placeholder="" pattern="[0-9]+" min="1" max="3" required>
        <div class="invalid-feedback">
          Number of strings to generate is required
        </div>
      </div>
      <div class="col-md-6">
        <label for="len" class="form-label">Length of strings to generate</label>
        <input type="text" class="form-control" id="len" name="len" placeholder="" pattern="[0-9]+" min="1" max="8" required>
        <div class="invalid-feedback">
          Length of strings to generate is required
        </div>
      </div>

      <div class="container mt-5">
    <h4>Strings should contain:</h4>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="digits" id="digits" name="digits">
      <label class="form-check-label" for="digits">
        Digits
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="unique" id="unique" name="unique">
      <label class="form-check-label" for="unique">
        Unique strings
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="upper" id="upper" name="upper">
      <label class="form-check-label" for="upper">
        Uppercase strings
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="lower" id="lower" name="lower">
      <label class="form-check-label" for="lower">
        Lowercase strings
      </label>
    </div>    


    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Request Operation</button>  
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function validateForm() {
    let digits = $('#digits').prop('checked');
    let upper = $('#upper').prop('checked');
    let lower = $('#lower').prop('checked');
    let atLeastOneChecked = digits || upper || lower;

    if (!atLeastOneChecked) {
      alert('Please select at least one option: Digits, Uppercase strings or Lowercase strings');
      
      return false;
    }
    
    return true;
  }
</script>