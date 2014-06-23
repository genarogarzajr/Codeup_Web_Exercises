<?php
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'genaro', 'letmein');

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



function getParks($dbc) {
return $dbc->query('SELECT * FROM national_parks' )->fetchAll(PDO::FETCH_ASSOC);
// print_r($stmt);

};


$answer = getParks($dbc);


// while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
//     print_r($row) . PHP_EOL;

?>
<html>

<head>
	<title>Retrieving Data Exercise</title>
</head>
<body>
<h1>Retrieving Data Exercise</h>

<p>
			<table border = 1px>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Location</th>
					<th>Date established</th>
					<th>Acreage</th>
					
				</tr>
				<? foreach (getParks($dbc) as $row) : ?>

				<tr>
						<? foreach ($row as $park) : ?>

						<td><?=($park);?></td>

						<? endforeach; ?>
						
				</tr>

				<? endforeach; ?>
			</table>
		</p>







</body>

</html>
