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
$addWineQuery->bindParam(':origin', $countryOfWine);
$addWineQuery->bindParam(':type', $typeOfWine);
$addWineQuery->bindParam(':grape', $grapeOfWine);

if(count($_SESSION) && isset($_POST)) {
    $nameOfWine = $_SESSION['name'];
    $typeOfWine = $_SESSION['type'];
    $countryOfWine = $_SESSION['country'];
    $grapeOfWine = $_SESSION['grape'];
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
                        <input type="text" placeholder="Insert wine name" name="name" class="input-name" required>
                        <div class="wine-characteristics-wrapper">
                            <div class="wine-characteristic">
                                <label>WINE TYPE</label>
                                <select name="type">
                                    <option value="Red">Red</option>
                                    <option value="White">White</option>
                                </select>
                            </div>
                            <div class="wine-characteristic">
                                <label>COUNTRY</label>
                                <input type="text" placeholder="Country" name="country" required>
                            </div>
                            <div class="wine-characteristic">
                                <label>GRAPE</label>
                                <input type="text" placeholder="Grape" name="grape" required>
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