<?php
 include_once("header.php") ;
error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);
//echo"hello" ;
	
	$server = "localhost";
	$username = "u19052431";
	$password = "lcfdbipj";
	$database = "dbu19052431";
	$mysqli = mysqli_connect($server, $username, $password, $database);

	$Pass=$_GET['loginPass'];

	$user=$_GET['user'];
	$image=$_GET['image'];
	$Email=$_GET['loginEmail'];


?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Indie+Flower&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href='../img/favicon.ico' />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<title>Snippers login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="../script/functionalit.js"></script>
	<meta charset="utf-8" />
	<meta name="author" content="Natascha Janse van Rensburg">
	 <!-- Replace Name Surname with your name and surname  -->
</head>
<body>
	<ul class="nav justify-content-end">
		<div class="row">
			<div class="col-4">
		<img src='../gallery/logo.png' alt='profile' class='card-img rounded-circle mb-3'>
	</div>
		 <div class="offset-3 col-4">
  <li class="nav-item">
  	<!-- <button type="button" class="btn" onclick="document.getElementById('cardlog').style.visibility = 'visible'">Login</button> -->
    <a class="nav-link " onclick="document.getElementById('profile').submit()" >Home</a>
  </li>
  <li class="nav-item">
  	<!-- <button type="button" class="btn btn-link">Register</button> -->
    <a class="nav-link" href="../index.html">Log-Out</a>
  </li>
   <li class="nav-item">
   	<!-- <button type="button" class="btn btn-link">About</button> -->
    <a class="nav-link" onclick="document.getElementById('profileload').submit()">Profile</a>
  </li></div></div>
</ul>
<div class="container mt-2">
	<div class='row' >
		
			<h1></h1>
        <!-- <div class='container'> -->
	          <div class='card m-auto  ' id='cardlog' >
	             <div class='card-header '>
	             	<div class='row'>
	             		
	             			<h2>Post Page</h2>
	             			
	             		
	             	</div>


	              </div>
	            </div>
	       <div >
			
        <?php 
       //echo $image;
        echo'
   			<form action="login.php" method="POST" style="visibility:hidden;" id="profile">';
   			echo"
									<input type='text' name='loginEmail' id='loginEmail' value='".$Email."' />
				 					<input type='text' name='loginPass' id='pass' value='".$Pass."' /><br/>
                      </form>

							";
							 echo'<form action="profilepage.php" method="POST" style="visibility:hidden;" id="profileload">';
      
              echo"    <input type='text' name='loginEmail' id='loginEmail' value='".$Email."' />
                  <input type='text' name='loginPass' id='pass' value='".$Pass."' /><br/>
                      </form>";
        $query = "SELECT * FROM Gallery WHERE image_id='".$image."'";
								$res = $mysqli->query($query);
								 if($res==false)
								{echo "no posts";}
									while($row = $res->fetch_assoc()) {
										// echo "fine";
										$query2 = "SELECT * FROM users where user_id='".$user."' ";
										$res2 = $mysqli->query($query2);
										$row2 = $res2->fetch_assoc();
										echo"<h1 class='page-header'>One of ". $row2['name']."'s posts</h1>
        <div class='row imageGallery'>
        	<div class='card col-12 mb-2'>
        	
<div name='infor'>
											<input name='pimage' type='hidden' value='".$row['image_id']."'/>
											<input name='user' type='hidden' value='".$row['user_id']."'/>
											<input name='email' type='hidden' value='".$row2['email']."'/>
											<input name='pass' type='hidden' value='".$row2['password']."'/>
											</div>
											  <img class='card-img-top m-1' src='../gallery/".$row['filename']."' alt='Card image cap'>
											  <div class='card-body'>";
											    echo"
											    <ul class='list-group' id='editat'>";
											    if($row['Description']!=""||$row['hash']!="")
											    {
											    if($row['Description']!="")
											    	echo"<li name='des' class='list-group-item'>".$row['Description']."</li>";
											     if($row['hash']!="")
											    echo"	<li name='hashtaggs' class='list-group-item'>".$row['hash']."</li>";

											   }
											   echo" 	</ul>";
											   						    	echo '<ul class="list-group list-group-flush" >';
			    	$query3 = "SELECT * FROM comment where user_id='".$row['user_id']."' AND  image_id='".$row['image_id']."'";
								 $res3 = $mysqli->query($query3);
								 $num=mysqli_num_rows($res3);
								 if($num){echo " <h5>comments:</h5><br>";
								 	//$count=0;
								 	//echo $query3;

								while($row3 = $res3->fetch_assoc()) 
								{
									
									echo '<li class="list-group-item">';

									echo  $row3['content'];
									echo '</li>';
									//echo '<br>';
									//echo $count;
									//$count=$count+1;
								}
							}
								else {

									echo"<h5>no comments</h5>";
								}
								echo  	"										   </ul>

											    <br><button class='btn btn-dark  ml-3 '>Add Comment</button>";
								 if(strtoupper($row2['email'])==strtoupper($Email))
											    	{echo"<button class='btn btn-dark  ml-3 '>Edit Post</button><button class='btn btn-dark  ml-3 '>Delete Post</button>";}


											    
        	echo"</div>";
									}
									
			?>
        	</div>
      
	</div>
</div>
</body>
</html>