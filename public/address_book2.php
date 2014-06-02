<?php 


$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];

$filename = "data/adr_bk.csv";

function write_csv($x_bigArray, $x_filename)
{
	if(is_writable($x_filename))
		{
			$x_handle = fopen($x_filename, "W");
			foreach ($x_bigArray as $x_fields) 
			{
				fputcsv($x_handle, $x_fields);
			}
			fclose($x_handle);
		}	
}

if (!empty($_POST)) 
	{
		$new_add = [];
		foreach ($_POST as $key => $value) 
		{
			$new_add[] = $value;
		}
	}



?>

<html>

<head>
	<title>Writing CSV file Exercise 2</title>
</head>
<body>
<h2>Writing CSV file Exercise 2</h2>


<table>
<tr>
	<th>Name</th>
	<th>Address</th>
	<th>City</th>
	<th>State</th>
	<th>Zip</th>
</tr>	
<? foreach ($address_book as $fields) : ?>
<tr>
	<? foreach ($fields as $value) : ?>
		<td><?= $value; ?></td>
	<? endforeach; ?>
</tr>
<? endforeach; ?>
</table>

<form method="POST">
    <p>
        <label for="Name">Name</label>
        <input id="Name" name="Name" type="text">
        <br>
        <label for="Address">Address</label>
        <input id="Address" name="Address" type="text">
        <br>
        <label for="City">City</label>
        <input id="City" name="City" type="text">
        <br>
        <label for="State">State</label>
        <input id="State" name="State" type="text">
        <br>
        <label for="Zip">Zip</label>
        <input id="Zip" name="Zip" type="text">
        <br>
    </p>
    
    <p>
        <input type="submit">
    </p>
</form>

</html>