<?php
require 'functions.php';

$db = new PDO('mysql:host=db; dbname=vegan-wines', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `list-of-wines`;');
$query->execute();
$allWines = $query->fetchAll();

$addWineQuery = $db->prepare('INSERT INTO `list-of-wines` (`name`,`origin`, `type`, `grape`) VALUES (:name, :origin, :type, :grape );'
);

$nameOfWine = $_POST['name'];
$typeOfWine = $_POST['type'];
$countryOfWine = $_POST['country'];
$grapeOfWine = $_POST['grape'];

$addWineQuery->bindParam(':name', $nameOfWine);
$addWineQuery->bindParam(':name', $typeOfWine);
$addWineQuery->bindParam(':name', $countryOfWine);
$addWineQuery->bindParam(':name', $grapeOfWine);
$addWineQuery->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Vegan Wines List</title>
</head>
<body>
    <h1>Winery List</h1>
    <form action="" method="post">
        <input type="text" placeholder="Name of wine" name="name" required>
        <input type="text" placeholder="Country" name="country" required>
        <input type="text" placeholder="Type of wine" name="type" required>
        <input type="text" placeholder="Grape" name="grape" required>
        <input type="submit">
    </form>
    <div class="wine-cards-container">
        <?php echo createWineCards($allWines);?>
    </div>
    <?php var_dump(addNewWine($newWine));?>
</body>

</html>
