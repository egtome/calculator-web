<div id="addition-operation" style="margin-left: 20px; margin-top: 7%; text-align:center;">
  <h4 class="mb-3">Addition Operation - Cost: <?= $params['operation_cost'] ?></h4>
  <form class="needs-validation" novalidate method="POST" onsubmit="return validateForm()">
      <div>
        <label for="value-a" class="form-label">Value A</label>
        <input type="text" class="form-control" id="value-a" name="value_a" placeholder="" required>
        <div class="invalid-feedback">
          Value A is required
        </div>
      </div>
      <br /><i class="fa fa-plus" style="display: inline !important;" ></i><br /><br />
      <div>
        <label for="value-b" class="form-label">Value B</label>
        <input type="text" class="form-control" id="value-b" name="value_b" placeholder="" required>
        <div class="invalid-feedback">
          Value B is required
        </div>
      </div>
    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Request Operation</button>  
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function validateForm() {
    let valueA = $('#value-a').val();
    let valueB = $('#value-b').val();
    let numberRegex = /^-?\d*\.?\d+$/;

    if (!numberRegex.test(valueA) || !numberRegex.test(valueB)) {
      alert('Please enter numbers only');
      
      return false;
    }
    
    return true;
  }

  $(document).ready(function() {
    $("title").append(' - Addition');
  });
</script>