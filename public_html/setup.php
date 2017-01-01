<?php
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
include_once "../resources/library/get_budget.php";
include_once "../resources/library/get_categories.php";
?>

<html>

  <head>
    <title>Setup | Budgeter</title>
    <!-- Include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
      <!-- Local style -->
      <link rel="stylesheet" href="css/forms.css">
      <!-- Local scripts -->
      <script src="js/submit_budget_form.js"></script>
      <script src="js/submit_new_category_form.js"></script>
      <script src="js/canvasjs.min.js"></script>
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
            <h2 id="budget" class="text-center" <?php if (!isset($budget)) echo "hidden"; ?>><?php if (isset($budget)) echo "Current: $".$budget; ?></h2>
          <form method="post" role="form" class="form-horizontal budget-form">
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

              <?php
              foreach ($names_to_amounts as $category=>$amount) { ?>
                <tr>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $amount; ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>

          <h3 class="text-center"><?php echo "$$sum_of_categories budgeted out of $$budget"; ?></h3>
          
          <form method="post" role="form" class="form-horizontal category-form">
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