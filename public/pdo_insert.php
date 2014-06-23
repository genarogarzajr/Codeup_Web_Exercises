<?php

// // Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'genaro', 'letmein');

// // Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create the query and assign to var
$query = 'CREATE TABLE national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    location VARCHAR(50) NOT NULL,
    date_established DATE NOT NULL,
    area INT NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
)';


$dbc->exec($query);


$parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => 'February 26, 1919', 'area' => '47389.67', 'description' => "Acadia descr"],
    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => 'November 12, 1971', 'area' => '76518.98', 'description' => "Arches descr"],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => 'November 10, 1978', 'area' => '242755.94', 'description' => "Badlands descr"],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area' => '801163.21', 'description' => "Big Bend descr"],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => 'June 28, 1980', 'area' => '172924.07', 'description' => "Biscayne descr"],
    ['name' => 'Canyonlands','location' => 'Utah', 'date_established' => 'September 12, 1964', 'area' => '337597.83', 'description' => "Canyonlands descr"],
    ['name' => 'Denali', 'location' => 'Alaska', 'date_established' => 'February 26, 1917', 'area' => '4740911.72', 'description' => "Denali descr"],
    ['name' => 'Everglades', 'location' => 'Florida', 'date_established' => 'May 30, 1934', 'area' => '1508537.90', 'description' => "Everglades descr"],
    ['name' => 'Glacier', 'location' => 'Montana', 'date_established' => 'May 11, 1910', 'area' => '1013572.41', 'description' => "Glacier descr"],
    ['name' => 'Grand Canyon','location' => 'Arizona', 'date_established' => 'February 26, 1919', 'area' => '1217403.32', 'description' => "Grand Canyon descr"]
];
//var_dump($parks);

foreach ($parks AS $park) {
    $QUERY = "INSERT INTO national_parks (name, location, date_established, area, description) VALUES ($park['name'],$park['location'], 
      $park['date_established'],$park['area'],$park['description']);
    
    $dbc->exec($QUERY);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}