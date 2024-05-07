<div id="random-string-operation" style="margin-left: 20px; margin-top: 7%; text-align:center;">
  <h4 class="mb-3">Random String Operation - Cost: <?= $params['operation_cost'] ?></h4>
  <form class="needs-validation" novalidate method="POST" onsubmit="return validateForm()">
      <div>
        <label for="num" class="form-label">Number of strings to generate</label>
        <input type="text" class="form-control" id="num" name="num" placeholder="" required>
        <div class="invalid-feedback">
          Number of strings to generate is required
        </div>
      </div>
      <div>
        <label for="len" class="form-label">Length of strings to generate</label>
        <input type="text" class="form-control" id="len" name="len" placeholder="" required>
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
    let num = $('#num').val();
    let len = $('#len').val();    
    let digits = $('#digits').prop('checked');
    let upper = $('#upper').prop('checked');
    let lower = $('#lower').prop('checked');
    let atLeastOneChecked = digits || upper || lower;
    let numberRegex = /^-?\d*\.?\d+$/;

    if (!numberRegex.test(num) || !numberRegex.test(len)) {
      alert('Please enter numbers only');
      
      return false;
    } else {
      if (num <= 0 || num > 10 || len <= 0 || len > 10) {
        alert('num and len values must be greater than 0 and less or equal than 10');
      
        return false;
      }      
    }    

    if (!atLeastOneChecked) {
      alert('Please select at least one option: Digits, Uppercase strings or Lowercase strings');
      
      return false;
    }
    
    return true;
  }

  $(document).ready(function() {
    $("title").append(' - Random String');
  });  
</script>