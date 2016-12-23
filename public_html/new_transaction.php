<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */

// Redirect if not logged in
// Redirect if no monthly budget
// Get categories
?>

<html>
<head>
    <title>New Transaction</title>
</head>

<body>
<h1>New Transaction</h1>

<form method="post">
    Date:<input type="date" name="date"><br>
    Type:<select name="type"></select><br>
    Amount:<input type="text" name="amount"><br>
    Additional Description:<input type="text" name="desc"><br>
    <input type="submit">
</form>
</body>
</html>
