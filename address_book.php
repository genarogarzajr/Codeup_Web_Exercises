<?php





?>




<html>

<head>
	<title>Writing CSV file Exercise</title>
</head>
<body>
<h2>Writing CSV file ExerciseExercise</h2>
<script type="text/javascript">
</script>




 <?   foreach ($list_array as $key => $value): ?>    
    <li><?=htmlspecialchars(strip_tags($value)); ?> <a href = 'todo_list.php?action=remove&amp;index=<?=$key?>'>remove</a></li>
<?    endforeach; ?>


<form method="POST" action="address_book.php">
    <p>
        <label for="NewItem">New Todo item</label>
        <input id="NewItem" name="NewItem" type="text">
    </p>
    
    <p>
        <input type="submit">
    </p>
</form>


</html>