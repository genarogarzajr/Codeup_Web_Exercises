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
        var_dump($_GET);
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

            <form method="GET">
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
                    <button type="submit"><img src="/img/email.gif" alt="send email"/></button>
                </p>

                <p>
                    <label for="save">Save to sent folder
                        <input type="checkbox" name="save" value="yes"></label>
                </p>
            </form>
<hr>

            <form method="GET">  
                <p>
                    <h2>Multiple Choice Test</h2>
                    who will win the NBA Championship?
                    <label for="San Antonio">
                        <input type="radio" id="q1a" name="q1a" value="San Antonio" checked>
                        San Antonio
                    </label>
                    <label for="OKC">
                        <input type="radio" id="q1b" name="q1b" value="Really?" disabled>
                        OKC
                    </label>
                    <label for="Miami">
                        <input type="radio" id="q1c" name="q1c" value="Really?" disabled>
                        Miami
                    </label>
                    <label for="Indiana">
                        <input type="radio" id="q1d" name="q1d" value="Really?" disabled>
                        Indiana
                    </label>
                </p>

                <p>
                    <button type="submit">Submit</button>
                </p>
            </form>

 <hr>               
            <form method="GET"> 
                <p>
                <h2>Select Testing</h2>
                <label for="traveled">Have you traveled outside US?</label>
                <select id="traveled" name="traveled">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                </p>
                
                <p>
                    <button type="submit">Submit</button>
                </p>

            </form>

<hr>

<form method="GET">  
                <p>
                    <h2>Multiple Choice Test</h2>
                    who will win the NBA Championship?
                    <select id="team" name="team[]" multiple>
                        <option value="spurs">Spurs</option>
                        <option value="thunder">thunder</option>
                        <option value="heat">heat</option>
                    </select>
                </p>

                <p>
                    <button type="submit">Submit</button>
                </p>
            </form>


<br>

<a href="#top">Go to the top of the page</a>

	</body>
</html>