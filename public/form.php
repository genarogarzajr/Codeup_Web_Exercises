<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<title>My First HTML Form</title>
			
			<!-- <link rel="shortcut icon" href="/img/favicon.ico"> -->
			
			<!-- <link rel="icon" type="img/gif" src="img/animated_favicon1.gif"> -->
	</head>	


	<body>		
		<a id="top"></a>


	<?php
        print_r($_GET);
        echo PHP_EOL;
        echo ".................POST\n";
        echo PHP_EOL;
        print_r($_POST);
    ?>

            <form method="POST" >
                <p>
                    <label for="username">Username</label>
                    <input id="username" name="user" type="text" placeholder="username">
                </p>
                <p>
                    <label for="password">Password</label>
                    <input id="password" name="pass" type="password" placeholder="password">
                </p>
                <p>
                    <!-- <input type="submit" value="process"> -->

                    <button type="submit">Login</button>
                </p>
            </form>






<a href="#top">Go to the top of the page</a>

	</body>
</html>