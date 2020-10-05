<?php
	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

	// define("DB_HOST", "localhost");
 //    define("DB_USER", "u19052431");
 //    define("DB_PASSWORD", "lcfdbipj");
 //    define("DB_DATABASE", "dbu19052431");

 //    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// echo "no point";
	$server = 'localhost';
	// define("DB_HOST", "localhost");
	$username = 'u19052431';
	$password = 'lcfdbipj';
	$database = 'dbu19052431';
	$mysqli = mysqli_connect($server, $username, $password, $database);

	if (!$mysqli)
		die("Connection failed: " . mysqli_connect_error());
	else
		echo "connected";

	$name = $_POST["regName"];
	$surname = $_POST["regSurname"];
	$email = $_POST["regEmail"];
	$date = $_POST["regBirthDate"];
	$pass = $_POST["regPass"];
	$pass1 = $_POST["regPass2"];
	if($pass1!=$pass)
	{
		echo '<div class="alert alert-danger mt-3" role="alert">
  						passwords dont match
  					</div>';
	}

	$query = "INSERT INTO users (`name`, `surname`, `password`,`email`, `birthday` ) VALUES ('$name', '$surname',  '$pass','$email', '$date');";

	$res = mysqli_query($mysqli, $query) == TRUE;
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Indie+Flower&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href='../img/favicon.ico' />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<meta charset="utf-8" />
	<title>Snippets Register</title>
	<meta name="author" content="Natascha Janse van Rensburg">
	Replace Name Surname with your name and surname
	<link rel="icon" type="image/x-icon" href='img/favicon.ico' />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

	<ul class="nav justify-content-end">
  <li class="nav-item">
  	<!-- <button type="button" class="btn" onclick="document.getElementById('cardlog').style.visibility = 'visible'">Login</button> -->
    <a class="nav-link " href="../index.html">Home</a>
  </li>
  <li class="nav-item">
  	<!-- <button type="button" class="btn btn-link">Register</button> -->
    <a class="nav-link" href="../index.html">Log-Out</a>
  </li>
   <li class="nav-item">
   	<!-- <button type="button" class="btn btn-link">About</button> -->
    <a class="nav-link" onclick="document.getElementById('cardlog').style.visibility = 'visible'">About</a>
  </li>
</ul>
	<?php //include_once(header.php) ?>

	<div class="container">
		<?php 
			if($res)
			{
				echo '<div class="alert alert-primary mt-3" role="alert">
  						The account has been created
  					</div>';

  				echo '	  
  				  <div class="card text-white " id="cardlog" >
             <div class="card-header col-12" >Log in </div>
            <form action="login.php" method="post">
               <div class="row">
               
                
                <div class="form-group col-12 col-lg-6  ">
                  
                    <label for="email" class="form-label">Email address:</label>
                    <input class="form-control" type="email" name="loginEmail" id="email" value="'.$email.'"/>
                </div>
                <div class="form-group col-12 col-lg-6  ">
                    <label class="form-label" for="pass">Password:</label>
                    <input class="form-control" type="password" name="loginPass" id="pass" placeholder="********"/>
                </div>
              

                <button class="btn btn-dark  ml-3 ">Log in   <i class="fa fa-angle-right"></i></button>
                  </div>
            </form>
        </div>';
  					
			}
  			else
  				echo '<div class="alert alert-danger mt-3" role="alert">
  						The account could not be created
  					</div>';
		?>
	</div>
</body>
</html>