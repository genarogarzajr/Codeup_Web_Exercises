<?php

// // Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'genaro', 'letmein');

// // Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// // Create the query and assign to var
// $query = 'CREATE TABLE national_parks (
// 	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//     name VARCHAR(50) NOT NULL,
//     location VARCHAR(50) NOT NULL,
//     date_established DATE NOT NULL,
//     area_in_acres INT NOT NULL,
//     PRIMARY KEY (id)
// )';

// $query2 = 'CREATE TABLE `national_parks2` (
//   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
//   `name` varchar(50) NOT NULL,
//   `location` varchar(50) NOT NULL,
//   `date_established` date NOT NULL,
//   `area_in_acres` int(11) NOT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=latin1';

// $dbc->exec($query);


$parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => 'February 26, 1919', 'area' => '47389.67'],
    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => 'November 12, 1971', 'area' => '76518.98'],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => 'November 10, 1978', 'area' => '242755.94'],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area' => '801163.21'],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => 'June 28, 1980', 'area' => '172924.07'],
    ['name' => 'Canyonlands','location' => 'Utah', 'date_established' => 'September 12, 1964', 'area' => '337597.83'],
    ['name' => 'Denali', 'location' => 'Alaska', 'date_established' => 'February 26, 1917', 'area' => '4740911.72'],
    ['name' => 'Everglades', 'location' => 'Florida', 'date_established' => 'May 30, 1934', 'area' => '1508537.90'],
    ['name' => 'Glacier', 'location' => 'Montana', 'date_established' => 'May 11, 1910', 'area' => '1013572.41'],
    ['name' => 'Grand Canyon','location' => 'Arizona', 'date_established' => 'February 26, 1919', 'area' => '1217403.32']
];
//var_dump($parks);

foreach ($parks AS $park) {
    $QUERY = "INSERT INTO national_parks (name, location, date_established, area) VALUES (\"{$park['name']}\",\"{$park['location']}\", \"{$park['date_established']}\",\"{$park['area']}\");";
    //echo "<p>INSERT INTO national_parks (name, location, date_established, area) VALUES (\"{$park['name']}\",\"{$park['location']}\", \"{$park['date_established']}\",\"{$park['area']}\");</p>";
    $dbc->exec($QUERY);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}