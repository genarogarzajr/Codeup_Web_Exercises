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

<!--             <form method="POST" >
                <p>
                    <label for="username">Username</label>
                    <input id="username" name="user" type="text" placeholder="username">
                </p>
                <p>
                    <label for="password">Password</label>
                    <input id="password" name="pass" type="password" placeholder="password">
                </p>
                
                <p>
                    <button type="submit">Login</button>
                </p>
            </form> -->

<hr>

            <form method="POST">
                <p>
                    <label for="to">To:</label>
                    <input id="to" name="to" type="email" placeholder="to">
                </p>
                <p>
                    <label for="from">From:</label>
                    <input id="from" name="from" type="text" placeholder="email">
                </p>
                <p>
                    <label for="subject">Subject:</label>
                    <input id="subject" name="subject" type="text" placeholder="subject">
                </p>
                <p>
                    <textarea name="body" rows="5" cols="50" placeholder="type message here"></textarea>


                <p>
                    <button type="submit">Submit</button>
                </p>





            </form>






<a href="#top">Go to the top of the page</a>

	</body>
</html>