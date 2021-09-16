<?php
session_start();
require 'functions.php';

$db = new PDO('mysql:host=db; dbname=vegan-wines', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `list-of-wines`;');
$query->execute();
$allWines = $query->fetchAll();

if(count($_SESSION) == 7 && isset($_POST) && $_SESSION['newItem'] === true) {
    $addWineQuery = $db->prepare('INSERT INTO `list-of-wines` (`name`,`origin`, `type`, `grape`, `favorite`, `rating`) VALUES (:name, :origin, :type, :grape, :favorite, :rating );');
    $addWineQuery->bindParam(':name', $nameOfWine);
    $addWineQuery->bindParam(':origin', $countryOfWine);
    $addWineQuery->bindParam(':type', $typeOfWine);
    $addWineQuery->bindParam(':grape', $grapeOfWine);
    $addWineQuery->bindParam(':favorite', $favoriteWine);
    $addWineQuery->bindParam(':rating', $ratingWine);
    $nameOfWine = $_SESSION['name'];
    $typeOfWine = $_SESSION['type'];
    $countryOfWine = $_SESSION['country'];
    $grapeOfWine = $_SESSION['grape'];
    $favoriteWine = $_SESSION['favorite'];
    $ratingWine = $_SESSION['rating'];
    $addWineQuery->execute();
    header("location:index.php");
}

if(count($_SESSION) == 5 && isset($_POST) && $_SESSION['submitRating'] === true) {
    $updateWineRatingQuery = $db->prepare('UPDATE `list-of-wines`
	SET `rating` = :rating
	WHERE `id` = :id');
    $updateWineRatingQuery->bindParam(':rating', $ratingWine);
    $updateWineRatingQuery->bindParam(':id', $id);
    $ratingWine = $_SESSION['rating'];
    $id = $_SESSION['id'];
    $updateWineRatingQuery->execute();
    header('Location:?'.$_SESSION['pagePosition']);
}

if(count($_SESSION) == 5 && isset($_POST) && $_SESSION['submitFavorite'] === true) {
    $updateWineRatingQuery = $db->prepare('UPDATE `list-of-wines`
	SET `favorite` = :favorite
	WHERE `id` = :id');
    $updateWineRatingQuery->bindParam(':favorite', $favoriteWine);
    $updateWineRatingQuery->bindParam(':id', $id);
    $favoriteWine = $_SESSION['favorite'];
    $id = $_SESSION['id'];
    $updateWineRatingQuery->execute();
    header('location:index.php?'.$_SESSION['pagePosition']);
}
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/5b176a6be4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Vegan Wines List</title>
</head>
<body>
    <header>
        <h1>My Wine List</h1>
    </header>
        <main>
        <div class="wine-cards-container">
            <div class ="wine-card-wrapper new-wine-label">
                <div class="wine-card">
                    <form id="newItemForm" action="submitVerification.php" method="POST" class="form-add-wine">
                        <label for="name">NAME</label>
                        <input type="text" placeholder="Insert wine name" name="name" class="input-name" id="name" required>
                        <div class="wine-characteristics-wrapper">
                            <div class="wine-characteristic">
                                <label for="type">WINE TYPE</label>
                                <select name="type"  id="type" >
                                    <option value="Red">Red</option>
                                    <option value="White">White</option>
                                </select>
                            </div>
                            <div class="wine-characteristic">
                                <label for="country">COUNTRY</label>
                                <input type="text" placeholder="Country" name="country" id="country"  required>
                            </div>
                            <div class="wine-characteristic">
                                <label for="grape">GRAPE</label>
                                <input type="text" placeholder="Grape" name="grape" id="grape"  required>
                            </div>
                        </div>
                        <button type="submit" class="add-button"><i class="fas fa-plus"></i> Add</button>
                    </form>
                </div>
            </div>

            <?php
            $reversedArray = array_reverse($allWines, true);
            echo (createWineCards($reversedArray));?>
        </div>
    </main>
</body>
<script defer src="js/index.js"></script>

</html>