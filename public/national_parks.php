<?php
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'genaro', 'letmein');

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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


// queries from database
$query = 'SELECT * FROM national_parks LIMIT 4 OFFSET ' . getOffset();
$parks = $dbc->query('SELECT * FROM national_parks LIMIT 4 OFFSET ' . getOffset())->fetchAll(PDO::FETCH_ASSOC);

//counts # of records from database
$count = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
//gets rounded up number of pages
$numPages = ceil($count / 4);

//gets current page $
// $page = isset($_GET['page']) ? $_GET['page'] : 1;

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
					
				</tr>
				<?php foreach ($parks as $park): ?>
                <tr>
                    <td><?= $park['name']; ?></td>
                    <td><?= $park['location']; ?></td>
                    <td><?= $park['date_established']; ?></td>
                    <td><?= $park['area']; ?></td>
                </tr>
            <?php endforeach ?>

				
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
</body>

</html>
