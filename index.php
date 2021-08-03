<?php
session_start();
require 'functions.php';

$db = new PDO('mysql:host=db; dbname=vegan-wines', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `list-of-wines`;');
$query->execute();
$allWines = $query->fetchAll();

$addWineQuery = $db->prepare('INSERT INTO `list-of-wines` (`name`,`origin`, `type`, `grape`) VALUES (:name, :origin, :type, :grape );');
$addWineQuery->bindParam(':name', $nameOfWine);
$addWineQuery->bindParam(':origin', $typeOfWine);
$addWineQuery->bindParam(':type', $countryOfWine);
$addWineQuery->bindParam(':grape', $grapeOfWine);


    if(count($_SESSION)){
        $nameOfWine = $_SESSION['name'];
        $typeOfWine = $_SESSION['type'];
        $countryOfWine = $_SESSION['country'];
        $grapeOfWine = $_SESSION['grape'];
        $newWine = [$nameOfWine, $typeOfWine, $countryOfWine, $grapeOfWine];
        $addWineQuery->execute();
        header("location:index.php");
    }

// https://en.ryte.com/wiki/Post-Redirect-Get#How_it_works

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Vegan Wines List</title>
</head>
<body>
    <header>
        <h1>Winery List</h1>
    </header>
    <main>
        <div class="wine-cards-container">
            <div class="wine-card">
                <form action="submitVerification.php" method="POST">
                    <div class="form-add-wine">
                        <input type="text" placeholder="Name of wine" name="name" class="input-name" required>
                    </div>
                    <div class="wine-characteristics">
                        <input type="text" placeholder="Country" name="country" required>
                        <input type="text" placeholder="Type of wine" name="type" required>
                        <input type="text" placeholder="Grape" name="grape" required>
                    </div>
                    <input type="submit">
                </form>
            </div>
            <?php echo createWineCards($allWines);?>
        </div>
        <!--        --><?php //var_dump(addNewWine($newWine));?>
    </main>
</body>

</html>

<?php
session_unset();
session_destroy();