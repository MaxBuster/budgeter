<?php
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
?>

<html>

  <head>
    <title>Setup | Budgeter</title>
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
      .panel {
        max-height: 200px;
        overflow: scroll;
      }
      .set_budget {
        border-style: solid;
        border-width: 2px;
      }
    </style>
    
    <script>
    $(document).ready(function(){
      $(".toggler").click(function(){
        $(".setup_container").toggle(1000);
      });
    });
    </script>
  </head>

  <body>
  <?php include '../resources/templates/nav.inc.php' ?>
    <div class="container">
      <h1 class="text-center">Setup</h1>
      
      <div id="monthly_budget_container">
        <h2><a class="toggler">
          <span class="glyphicon glyphicon-menu-down"></span>
          Set Budget
        </a></h2>
        
        <hr>
        
        <div class="setup_container">
          <form method="post" role="form" class="form-horizontal">
            <div class="form-group">
                <label for="monthly_budget" class="col-sm-4 col-form-label">Monthly Budget</label>
                <div class="col-sm-8">
                  <input name="monthly_budget" id="monthly_budget" type="text" maxlength="255"  class="form-control" placeholder="Monthly Budget">
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-block" value="Set Budget" id="set_budget">
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <div id="category_container">
        <h2><a class="toggler">
          <span class="glyphicon glyphicon-menu-down"></span>
          Set Categories
        </a></h2>
        
        <hr>
        <div class="setup_container" hidden>
          <div class="panel panel-default">
            <table class="table table-striped pre-scrollable">
              <tr>
                <th>Category</th>
                <th>Budget</th>
              </tr>
            </table>
          </div>
          
          <form method="post" role="form" class="form-horizontal">
            <div class="form-group">
                <label for="category" class="col-sm-4 col-form-label">Category Name</label>
                <div class="col-sm-8">
                  <input name="category" id="category" type="text" maxlength="255"  class="form-control" placeholder="Category Name">
                </div>
            </div>
            <div class="form-group">
                <label for="category_budget" class="col-sm-4 col-form-label">Category Budget</label>
                <div class="col-sm-8">
                  <input name="category_budget" id="category_budget" type="text" maxlength="255"  class="form-control" placeholder="Category Budget">
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-block" value="Set Category" id="set_category">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

</html>