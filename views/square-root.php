<div id="square-root--operation" style="margin-left: 20px; margin-top: 7%; text-align:center;">
  <h4 class="mb-3">Square Root Operation - Cost: <?= $params['operation_cost'] ?></h4>
  <form class="needs-validation" novalidate method="POST" onsubmit="return validateForm()">
      <div>
        <label for="value-a" class="form-label"><h3>&Sqrt;</h3></label>
        <input type="text" class="form-control" id="value-a" name="value_a" placeholder="" required />
        <div class="invalid-feedback">
          Value is required
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
    let numberRegex = /^-?\d*\.?\d+$/;

    if (!numberRegex.test(valueA)) {
      alert('Please enter numbers only');
      
      return false;
    } else {
      if (valueA < 0) {
        alert('The square root of a negative number is undefined and cannot be calculated.');
      
        return false;
      }      
    }
    
    return true;
  }
  $(document).ready(function() {
    $("title").append(' - Square Root');
  });  
</script>