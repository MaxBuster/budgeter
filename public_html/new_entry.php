<?php
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
?>

<html>

  <head>
    <title>New Entry | Budgeter</title>
    <!-- Include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    
    <style>
      .container {
        max-width: 500px;
        padding: 15px;
        margin: 0 auto;
      }
    </style>
    
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
            <label for="amount" class="col-sm-4 col-form-label">Amount</label>
            <div class="col-sm-8">
              <input name="amount" id="amount" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-sm-4 col-form-label">Category</label>
            <div class="col-sm-8">
              <select name="category" id="category" class="form-control">
                <option value="rent">Rent</option>
                <option value="food">Food</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="col-sm-4 col-form-label">Description</label>
            <div class="col-sm-8">
              <input name="desc" id="desc" type="text" class="form-control">
            </div>
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