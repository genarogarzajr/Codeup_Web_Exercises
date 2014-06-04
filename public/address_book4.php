<?php

$addressBook = [];
$errorMessage = '';

include("classes/address_data_store.php");

$ads = new AddressDataStore("data/adr_bk.csv");

$addressBook = $ads->readAddressBook();

if (!empty($_POST))
{
	// we must be trying to add a new address
	if (!empty($_POST['name']) && !empty($_POST['address'])) // todo finish the validation
	{
		// validation success
		$newAddress = [];
		$newAddress['name'] = $_POST['name'];
		$newAddress['address'] = $_POST['address'];
		$newAddress['city'] = $_POST['city'];
		$newAddress['state'] = $_POST['state'];
		$newAddress['zip'] = $_POST['zip'];
		$newAddress['phone'] = $_POST['phone'];





		if (empty($_POST['phone'])) {
			$newAddress['phone'] = '';
		} else {
			$newAddress['phone'] = $_POST['phone'];
		}
		// assign the rest of the values
		// todo
		// 
		// push onto address book
		$addressBook[] = $newAddress;

		// save the address book
		$ads->writeAddressBook($addressBook);
	}
	else
	{
		// validation failed
		$errorMessage = "Validation failed. Please complete all fields.";
	}
}

// Verify there were uploaded files and no errors
if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {

    if ($_FILES['file1']["type"] != "text/csv") {
        echo "ERROR: file must be in text/csv!";
    } else {
        // Set the destination directory for uploads
        // Grab the filename from the uploaded file by using basename
        $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
        $uploadFilename = basename($_FILES['file1']['name']);
        // Create the saved filename using the file's original name and our upload directory
        $saved_filename = $upload_dir . $uploadFilename;
        // Move the file from the temp location to our uploads directory
        move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

        // load the new todos
        // merge with existing list
        $ups = new AddressDataStore($saved_filename);
        $address_uploaded = $ups->readAddressBook();
        $addressBook = array_merge($addressBook, $address_uploaded);
        $ads->writeAddressBook($addressBook);
    }
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Address Book</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<h1>Address Book</h1>
		<? if (!empty($errorMessage)) : ?>
			<p><?=$errorMessage;?></p>
		<? endif; ?>
		<p>
			<table border = 1>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Zip</th>
					<th>Phone</th>
				</tr>
				<? foreach ($addressBook as $index => $row) : ?>

					<tr>
						<? foreach ($row as $column) : ?>

							<td><?=htmlspecialchars(strip_tags($column));?></td>

						<? endforeach; ?>
					</tr>

				<? endforeach; ?>
			</table>
		</p>

		<p>
			<form method="POST">

				<label for="name">Name</label>
				<input type="text" name="name" id="name">
				<br>
				<label for="address">Address</label>
				<input type="text" name="address" id="address">
				<br>
				<label for="city">city</label>
				<input type="text" name="city" id="city">
				<br>
				<label for="state">state</label>
				<input type="text" name="state" id="state">
				<br>
				<label for="zip">zip</label>
				<input type="text" name="zip" id="zip">
				<br>
				<label for="phone">Phone</label>
				<input type="text" name="phone" id="phone">				
				<br>
				<input type="submit">

			</form>
		</p>

		<h3>Upload File</h3>

       	<form method="POST" enctype="multipart/form-data">
           <p>
               <label for="file1">File to upload: </label>
               <input type="file" id="file1" name="file1">
           </p>

           <p><input type="submit" value="Upload"></p>

       	</form>
		
	</body>
</html>