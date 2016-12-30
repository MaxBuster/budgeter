<?php
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
include_once "../resources/library/get_categories.php";
?>

<html>

  <head>
    <title>New Entry | Budgeter</title>
    <!-- Include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Local style -->
    <link rel="stylesheet" href="css/forms.css">
    <!-- Local scripts -->
    <script src="js/submit_new_entry_form.js"></script>
    
    <script>
      $(document).ready(function(){
        document.getElementById('date').valueAsDate = new Date();
      });
    </script>
  </head>

  <body>
  <?php include '../resources/templates/nav.inc.php' ?>
    
    <div class="container">
      <h1 class="text-center">New Entry</h1>
      
      <form method="post" role="form" class="form-horizontal">
        <div class="form-group">
            <label for="date" class="col-sm-4 col-form-label">Date</label>
            <div class="col-sm-8">
              <input name="date" id="date" type="date" class="form-control">
            </div>
        </div>
          <div class="form-group">
              <label for="category" class="col-sm-4 col-form-label">Category</label>
              <div class="col-sm-8">
                  <select name="category" id="category_id" class="form-control">
                      <option value="10000">One Time Expense</option>
                      <?php
                        foreach ($ids_to_names as $id=>$category) {
                      ?>
                      <option value="<?php echo $id; ?>"><?php echo $category; ?></option>
                      <?php } ?>
                  </select>
              </div>
          </div>
        <div class="form-group">
            <label for="amount" class="col-sm-4 col-form-label">Amount</label>
            <div class="col-sm-8">
              <input name="amount" id="amount" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-4 col-form-label">Description</label>
            <div class="col-sm-8">
              <input name="description" id="description" type="text" class="form-control">
            </div>
        </div>
          <div id="warning" class="alert alert-danger" hidden>
              <p class="text-center" id="warning-message"></p>
          </div>
          <div id="success" class="success alert-success" hidden>
              <p class="text-center" id="success-message"></p>
          </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="submit" class="btn btn-primary btn-block" value="Submit Entry" id="submit_entry">
          </div>
        </div>
      </form>
    </div>
  </body>

</html>