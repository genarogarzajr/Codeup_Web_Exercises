<?php
//>>>>>>CODE STARTS HERE<<<<<<<<<<<<<<<<<<
function getOffset() {
    // $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if (isset($_GET['page'])) 
    {
    $page = $_GET['page'];
    }  else 
        {
        $page = 1;
        }

    return ($page - 1) * 4;
}


//1.establishes database connection  DONE
$dbc = new PDO('mysql:host=127.0.0.1;dbname=address_book', 'genaro', 'letmein');
// exceptions if errors
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//  2. retrieves saved addressbook items from DB
    // queries from database for displaying
    $query = 'SELECT id, first_name, last_name, phone, count(ca.addresses_id) AS address_count
     FROM contacts c
     LEFT JOIN contact_addresses ca ON c.id = ca.contacts_id
     GROUP BY first_name, last_name, phone 
     LIMIT :limit OFFSET :offset';

// bind in values for limit and offset

$stmt = $dbc->prepare($query);

$stmt->bindValue(':limit', 4, PDO::PARAM_INT);
$stmt->bindValue(':offset', getOffset(), PDO::PARAM_INT);
$stmt->execute();


$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($items);




?>
<html>
<head>
	<title>Address Book: Contacts</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">

	<h1>Address Book: Contacts</h1>
<!-- ================================ -->

<table class="table table-striped">
    <!-- prints each item in array & adds remove link -->
    <tr>
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone Number</th>
		<th># of Addresss</th>
		<th>Actions</th>
	</tr>
    <? if (!empty($items)) : ?>
        <?   foreach ($items as $item): ?> 
            <tr>
            	<td><?=htmlspecialchars(strip_tags($item['id'])); ?></td>
            	<td><?=htmlspecialchars(strip_tags($item['first_name'])); ?></td>
            	<td><?=htmlspecialchars(strip_tags($item['last_name'])); ?></td>
            	<td><?=htmlspecialchars(strip_tags($item['phone'])); ?></td>          <td># ADDRESSES</td>
            	
            	<td> <a class="btn btn-small btn-default" href="contact_addresses.php?contact_id=<?=$item['id']?>">View</a>
				<button class="btn btn-small btn-danger btn-remove" data-contact="1">Remove</button></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <p>
            <?= "Your list is empty! Add some stuff!"; ?>
        </p>
    <? endif; ?>
</table>

<!-- ================================ -->



	<div class="clearfix"></div>

	<h2>Add New Contact</h2>
	<form class="form-inline" role="form" action="contact.php" method="POST">
		<div class="form-group">
			<label class="sr-only" for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Name">
		</div>
		<div class="form-group">
			<label class="sr-only" for="phone_number">Phone #</label>
			<input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone #">
		</div>
		<button type="submit" class="btn btn-default btn-success">Add Contact</button>
	</form>

</div>

<form id="remove-form" action="contacts.php" method="post">
	<input id="remove-id" type="hidden" name="remove" value="">
</form>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script>

$('.btn-remove').click(function () {
	var contactId = $(this).data('contact');
	if (confirm('Are you sure you want to remove contact ' + contactId + '?')) {
		$('#remove-id').val(contactId);
		$('#remove-form').submit();
	}
});

</script>

</body>
</html>