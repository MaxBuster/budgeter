<?php
include_once realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/logged_in.inc.php';
?>

<nav class = "navbar navbar-default" role = "navigation">

    <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle"
                data-toggle = "collapse" data-target = "#site-navbar-collapse">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
        </button>

        <a class = "navbar-brand" href = "#">Budgeter</a>
    </div>

    <?php
        if ($logged_in) {
            include 'logged_in_nav.html';
        } else {
            include 'logged_out_nav.html';
        }
    ?>

</nav>
