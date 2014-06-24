<?php
//establishes database connection
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'genaro', 'letmein');
// exceptions if errors
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//gets offset for displaying list
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

if ($_POST) 
	{	

	if (empty($_POST['name']) || empty($_POST['location'])  || empty($_POST['date_established']) || empty($_POST['area']) || empty($_POST['description'])) 
			{
				echo '<script type="text/javascript">alert("all fields must be filled in"); </script>';
			} else 
				{
					// posts to database
	//establishes database connection
	$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'genaro', 'letmein');
	// exceptions if errors
	$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $dbc->prepare("INSERT INTO national_parks (name, location, date_established, area, description) VALUES (:name, :location, :date_established, :area, :description)");
    	 
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $_POST['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area', $_POST['area'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);

    $stmt->execute();

				}



	

	} 



// queries from database for displaying
$query = 'SELECT * FROM national_parks LIMIT 4 OFFSET ' . getOffset();

$parks = $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);

//counts # of records from database
$count = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
//gets rounded up number of pages
$numPages = ceil($count / 4);

//gets current page $
if (isset($_GET['page'])) 
	{
	$page = $_GET['page'];
	}  else 
		{
		$page = 1;
		}



$nextPage = $page + 1;

$prevPage = $page - 1;





?>
<html>

<head>
	<title>Retrieving Data Exercise</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
</head>
<body>
<h1>Retrieving Data Exercise</h>

<div class="container">
			<table class="table table-striped table-hover">
				<tr>
					
					<th>Name</th>
					<th>Location</th>
					<th>Date established</th>
					<th>Acreage</th>
					<th>Description</th>
					
				</tr>
				<?php foreach ($parks as $park): ?>
                <tr>
                    <td><?= $park['name']; ?></td>
                    <td><?= $park['location']; ?></td>
                    <td><?= $park['date_established']; ?></td>
                    <td><?= $park['area']; ?></td>
                    <td><?= $park['description']; ?></td>
                </tr>
            <?php endforeach ?>


            <?php print_r($_POST); ?>
				
			</table>
		</p>



<ul class="pager">
	

<?php if ($page > 1): ?>
	<li class="previous"><a href="?page=<?= $prevPage ?>">&larr; Older</a></li>
<?php endif; ?>


<?php if ($page < $numPages): ?>
  <li class="next"><a href="?page=<?= $nextPage ?>">&rarr; Next</a></li>
<?php endif; ?>

  
</ul>

</div>

<div>

<form method="POST">

				<label for="name">Name</label>
				<input type="text" name="name" id="name">
				<br>
				<label for="location">location</label>
				<input type="text" name="location" id="location">
				<br>
				<label for="date_established">date_established</label>
				<input type="text" name="date_established" id="date_established">
				<br>
				<label for="area">area</label>
				<input type="text" name="area" id="area">
				<br>
				<label for="description">description</label>
				<input type="text" name="description" id="description">
				<br>
				<input type="submit">

			</form>

</div>





</body>

</html>
