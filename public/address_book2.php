<?php 

class AddressDataStore {

    public $filename = "data/adr_bk.csv";

    function read_address_book()
    {
        // Code to read file $this->filename
    	//reads file on open
		$handle = fopen($this->filename, 'r');
		$add_book = [];

		while (!feof($handle)) 
		{
			$row = fgetcsv($handle);
			if (is_array($row)) 
				{
					$add_book[] = $row;
				}
		}
		fclose($handle);
		return $add_book;
    }

    function write_address_book($addresses_array) 
    {
        // Code to write $addresses_array to file $this->filename
    	$handle = fopen($this->filename, "w");
			foreach ($addresses_array as $fields) 
			{
				fputcsv($handle, $fields);
			}
			fclose($handle);
    }

}


//-------------------------------------------
$startup = new AddressDataStore();
$add_book = $startup->read_address_book();


//---------------------------------------------

//>>>>>>>>CODE STARTS HERE<<<<<<<<<<<<<<<<<<<<
$new_address = [];


//checks if removing item from hyperlink via GET
if (isset($_GET['index']))
{
    //removes item from hyperlink
    unset($add_book[$_GET['index']]);
    write_csv($add_book, $filename);
}


// Error check
if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip'])) 
{	//add new entry to existing array
    $new_address['name'] = $_POST['name'];
    $new_address['address'] = $_POST['address'];
    $new_address['city'] = $_POST['city'];
    $new_address['state'] = $_POST['state'];
    $new_address['zip'] = $_POST['zip'];
    $new_address['phone'] = $_POST['phone'];
    $add_book[] = $new_address;

	$startup->write_address_book($add_book);
    
} else 
	{
		//displays error for each missing item
	    foreach ($_POST as $key => $value) 
	    {
	        if (empty($value)) 
	        {
	            echo "<h1>" . ucfirst($key) .  " is empty.</h1>";
	        }
	    }
	}


?>

<html>

<head>
	<title>Writing CSV file Exercise 2</title>
</head>
<body>
<h2>Writing CSV file Exercise 2</h2>


<table border = 1>
<tr>
	<th>Name</th>
	<th>Address</th>
	<th>City</th>
	<th>State</th>
	<th>Zip</th>
	<th>Phone</th>
</tr>	
<? foreach ($add_book as $key => $fields) : ?>
<tr>
	<? foreach ($fields as $value) : ?>
		<td><?= htmlspecialchars(strip_tags($value)); ?></td>

	<? endforeach; ?>
<td><a href = 'address_book2.php?action=remove&amp;index=<?=$key?>'>remove</a></td>
</tr>
<? endforeach; ?>
</table>

<form method="POST">
    <p>
        <label for="name">Name</label>
        <input id="name" name="name" type="text">
        <br>
        <label for="address">Address</label>
        <input id="address" name="address" type="text">
        <br>
        <label for="city">City</label>
        <input id="city" name="city" type="text">
        <br>
        <label for="state">State</label>
        <input id="state" name="state" type="text">
        <br>
        <label for="zip">Zip</label>
        <input id="zip" name="zip" type="text">
        <br>
        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text">
    </p>
    
    <p>
        <input type="submit">
    </p>
</form>

</html>