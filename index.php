<?php

// creating a PDO object with the appropriate credentials for our db
$db = new PDO('mysql:host=db; dbname=vegan-wines', 'root', 'password');

// calling a function that belongs to the object
// changing the default "fetch mode" of the PDO - this affects the format of the data that gets pulled out of the db
//e.g. PDO::FETCH_ASSOC formats the output from the db as an associative array
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// creating a query object
//"preparing" a query - the query has not been run yet, only created and prepared
$query = $db->prepare('SELECT * FROM `list-of-wines`;');

// THE ONE TIME that the PDO communicates with the db
$query->execute();

$allWines = $query->fetchAll(); // a special function that returns all rows from the output from the db

echo '<h1>Winery List</h1>
      <h2>Name</h2><h2>Origin</h2><h2>Type</h2><h2>Grape</h2>';


foreach ($allWines as $wine) {
    echo '<ul>';
    echo '<li>' . $wine['name'] . '</li>';
    echo '<li>' . $wine['origin'] . '</li>';
    echo '<li>' . $wine['type'] . '</li>';
    echo '<li>' . $wine['grape'] . '</li>';
    echo '</ul>';
}


//
//print_r($allWines);
//
//echo ($allWines[0]['id']);
//echo ($allWines[0]['name']);
//echo ($allWines[0]['origin']);
//echo ($allWines[0]['grape']);