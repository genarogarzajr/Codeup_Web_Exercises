<?php

$list_array = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];

    //$list_array = [];
    $list_array = array_merge($list_array,$_POST);
    var_dump($list_array);

    

function save_file($filename, $contents)
{
    $handle = fopen($filename, "w");
    fwrite($handle, $contents);
    fclose($handle);
}

?>
<html>

<head>
<style>
table,th,td
{
border:1px solid black;
}
</style>
	<title>Writing CSV file Exercise</title>
</head>
<body>
<h2>Writing CSV file Exercise</h2>


<table>
<tr>
	<th>Name</th>
	<th>Address</th>
	<th>City</th>
	<th>State</th>
	<th>Zip</th>
</tr>	
<?   foreach ($list_array as $key => $value): ?>    
    <td><?=($value) ?></td>
<?    endforeach; ?> 
</table>



-->


<form method="POST" action="address_book.php">
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
<?

?>
</html>