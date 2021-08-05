<?php
session_start();
require 'functions.php';

$db = new PDO('mysql:host=db; dbname=vegan-wines', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `list-of-wines`;');
$query->execute();
$allWines = $query->fetchAll();

$addWineQuery = $db->prepare('INSERT INTO `list-of-wines` (`name`,`origin`, `type`, `grape`, `favorite`, `rating`) VALUES (:name, :origin, :type, :grape, :favorite, :rating );');
$addWineQuery->bindParam(':name', $nameOfWine);
$addWineQuery->bindParam(':origin', $countryOfWine);
$addWineQuery->bindParam(':type', $typeOfWine);
$addWineQuery->bindParam(':grape', $grapeOfWine);
$addWineQuery->bindParam(':favorite', $favoriteWine);
$addWineQuery->bindParam(':rating', $ratingWine);

if(count($_SESSION) == 6 && isset($_POST)) {
    $nameOfWine = $_SESSION['name'];
    $typeOfWine = $_SESSION['type'];
    $countryOfWine = $_SESSION['country'];
    $grapeOfWine = $_SESSION['grape'];
    $grapeOfWine = $_SESSION['grape'];
    $favoriteWine = $_SESSION['favorite'];
    $ratingWine = $_SESSION['rating'];
    $addWineQuery->execute();
    header("location:index.php");
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
                    <form action="submitVerification.php" method="POST" class="form-add-wine">
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
                            <div class="item-settings">
                                <div class="wine-rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <div class="wine-favorite">
                                    <label for="favorite">
                                        <input type="checkbox" name="favorite" id="favorite" value="1"/>
                                        <span class="lbl padding-8"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="add-button"><i class="fas fa-plus"></i> Add</button>
                    </form>
                </div>
            </div>

            <?php echo createWineCards($allWines);?>
        </div>
    </main>
</body>

</html>