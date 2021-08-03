<?php

require_once 'db-query.php';
require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--CUSTOM STYLESHEET-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Vegan Wines List</title>
</head>
<body>
    <h1>Winery List</h1>
    <div class="wine-cards-container">
        <!-- >should  i create a wine class? and then call the class inside the html -->
        <?php echo createWineCard($allWines);?>
    </div>

</body>

</html>
