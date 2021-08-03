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

var_dump($allWines);