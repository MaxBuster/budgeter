<?php
/**
 * User: Max Buster
 * Date: 12/28/2016
 */
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
include_once "../resources/library/get_categories.php";
include "../resources/library/get_entries.php";
?>

<html>

<head>
    <title>Analysis | Budgeter</title>
    <!-- Include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Local style -->
    <link rel="stylesheet" href="css/forms.css">

    <script src="js/canvasjs.min.js"></script>
    <script>
        $(document).ready(function(){

        $("#pie").click(function() {
            var chart = new CanvasJS.Chart("chartContainer",
            {
                title: {
                    text: "Category Breakdown"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{indexLabel}: ${y}",
                        legendText: "{indexLabel}",
                        dataPoints: [
                            <?php
                            foreach ($names_to_amounts as $name=>$amount) {
                            ?>
                            {y: <?php echo $amount; ?>, indexLabel: <?php echo "\"$name\""; ?>},
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart.render();
        });


        $("#line").click(function() {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    title: {
                        text: "Monthly Spend"
                    },
                    axisX: {
                        title: "Day of Month",
                        interval: 1
                    },
                    axisY: {
                        title: "Dollars Spent"
                    },
                    data: [
                        {
                            type: "line",
                            dataPoints: [
                                <?php
                                foreach ($spend as $date=>$cdf) {
                                ?>
                                {x: <?php echo $date; ?>, y: <?php echo $cdf; ?>},
                                <?php } ?>
                            ]
                        }
                    ]
                });
            chart.render();
        });
        });
    </script>
</head>

<body>
<?php include '../resources/templates/nav.inc.php' ?>
<div class="container">
    <h1 class="text-center">Analysis</h1>

    <label class="radio-inline"><input type="radio" name="optradio" id="pie">Category Split</label>
    <label class="radio-inline"><input type="radio" name="optradio" id="line">Budget Burn</label>

    <div id="chartContainer">
    </div>
</div>
</body>

</html>