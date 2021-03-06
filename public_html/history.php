<?php
/**
 * User: Max Buster
 * Date: 12/28/2016
 */
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
include "../resources/library/get_entries.php";
?>

<html>

<head>
    <title>History | Budgeter</title>
    <!-- Include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Local style -->
    <link rel="stylesheet" href="css/forms.css">
</head>

<body>
<?php include '../resources/templates/nav.inc.php' ?>
<div class="container">
    <h1 class="text-center">History</h1>

    <div class="panel panel-default">
        <table class="table table-striped pre-scrollable">
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
            <?php
                foreach ($entries as $value) {
            ?>
            <tr>
                <td><?php echo $value[0]; ?></td>
                <td><?php echo $value[1]; ?></td>
                <td><?php echo $value[2]; ?></td>
                <td><?php echo $value[3]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>

</html>