<?php
	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

	$server = "localhost";
	$username = "u19052431";
	$password = "lcfdbipj";
	$database = "dbu19052431";
	$mysqli = mysqli_connect($server, $username, $password, $database);

	$email = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : false;
	$pass = isset($_POST["loginPass"]) ? $_POST["loginPass"] : false;	
	// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
		//echo $email;
		//echo $pass;
?>
<?php include_once("header.php") ?>


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
    <a class="nav-link " >Home</a>
  </li>
  <li class="nav-item">
  	<!-- <button type="button" class="btn btn-link">Register</button> -->
    <a class="nav-link" href="../index.html">Log-Out</a>
  </li>
   <li class="nav-item">
   	<!-- <button type="button" class="btn btn-link">About</button> -->
    <a class="nav-link" onclick="document.getElementById('profileload').submit()">Profile</a>
  </li>
</ul>
</div>
</div> 
	<div class="container">
		<?php
		  echo'<form action="login.php" method="POST" style="visibility:hidden;" id="profile">';
      
              echo"    <input type='text' name='loginEmail' id='loginEmail' value='".$email."' />
                  <input type='text' name='loginPass' id='pass' value='".$pass."' /><br/>
                      </form>";
                       echo'<form action="profilepage.php" method="POST" style="visibility:hidden;" id="profileload">';
      
              echo"    <input type='text' name='loginEmail' id='loginEmail' value='".$email."' />
                  <input type='text' name='loginPass' id='pass' value='".$pass."' /><br/>
                      </form>";
		
			if($email && $pass){
				$query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
				$res = $mysqli->query($query);
				if($row = mysqli_fetch_array($res)){
				
//<div class='card'>
//   <div class='row no-gutters'>
//     <div class='col-md-4'>
//       <img src='../img/logo.png' class='card-img rounded-circle' alt="...">
//     </div>
//     <div class='col-md-8'>
//       <div class='card-body'>
//         <h1 class='card-title'>Card title</h1>
//      </div>
//     </div>
//   </div>
// </div>
										// 		<div class='col-4'>
										// 	 <img src='../img/logo.png' alt='profile' class='card-img rounded-circle mb-3'>
										// </div>
										// <div class='col-6'>
											
											
										// </div>
					//echo $email;
							echo'
   			<form action="profilepage.php" method="POST" style="visibility:hidden;" id="profile">';
   			echo"
									<input type='text' name='loginEmail' id='loginEmail' value='".$email."' />
				 					<input type='text' name='loginPass' id='pass' value='".$pass."' /><br/>
                      </form>

							";		
$log="";
				echo"

 	<div class='row' >
			<div class='col-12 col-lg-3 ' >
			<h1></h1>
        <!-- <div class='container'> -->
	          <div class='card m-1'id='cardlog' >
	             <div class='card-header '>
	             	<div class='row'>
	             		
	             			<h2>Snippet's Home</h2>
	             			
	             		
	             	</div>


	              </div>
	            
	        </div>
        <!-- </div> -->
        
    	</div>
    	<div class='col-12 col-xl-9'>
			<h1 class='page-header'>Local Feed</h1>";
        echo "<div class='row imageGallery'>";
								$curUser=$row['user_id'];
								//echo $curUser;
							$query = "SELECT * FROM Gallery order by time_of_pic DESC ";
								$res = $mysqli->query($query);
								//  if($res==false)
								// {echo "no posts";}
									while($row = $res->fetch_assoc()) {
										$query2 = "SELECT * FROM users where user_id='".$row['user_id']."' ";
										$res2 = $mysqli->query($query2);
										$row2 = $res2->fetch_assoc();
										echo" 

											<div class='card col-12 mb-2'>
											 <div name='infor'>
											<input name='pimage' type='hidden' value='".$row['image_id']."'/>
											<input name='user' type='hidden' value='".$row['user_id']."'/>
											<input name='email' type='hidden' value='".$row2['email']."'/>
											<input name='pass' type='hidden' value='".$row2['password']."'/>
											</div>
											  <img class='card-img-top m-1' src='../gallery/".$row['filename']."' alt='Card image cap'>
											  <div class='card-body'>
											    <h5 class='card-title'>".$row2['name']."</h5>
											    ";
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


///////////////////////////////////////////////////////////////////////////////////
///////////////////////comments////////////////
							//echo $row['image_id'];
											    	echo '<ul class="list-group list-group-flush" >';
			    	$query3 = "SELECT * FROM comment where user_id='".$row['user_id']."' AND  image_id='".$row['image_id']."' LIMIT 5 ";
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
											    if(strtoupper($row2['email'])==strtoupper($email))
											    	{echo"<button class='btn btn-dark  ml-3 '>Edit Post</button><button class='btn btn-dark  ml-3 '>Delete Post</button>";}
											    else
											    {
											    	// echo $row2['user_id'];
											    	// echo $row['user_id'];
											    }
											    echo" <button class='btn btn-dark  ml-3 '>View Post</button>
											  </div>
											 
											</div>
											
		   										 
		  									";
		  								}
								// }


					echo "</div>";//gallery div


        echo"</div>

 
</div>";
					// echo 	"<table class='table table-bordered mt-3'>
					// 			<tr>
					// 				<td>Surname</td>
					// 				<td>" . $row['surname'] . "</td>
					// 			<tr>
					// 			<tr>
					// 				<td>Email Address</td>
					// 				<td>" . $row['email'] . "</td>
					// 			<tr>
					// 			<tr>
					// 				<td>Birthday</td>
					// 				<td>" . $row['birthday'] . "</td>
					// 			<tr>
					// 		</table>";
				
				
						  	
						//	Gallery 
					
					// echo "<div class='row imageGallery'>";
					// 			$curUser=$row['user_id'];

					// 		$query = "SELECT * FROM Gallery WHERE user_id = '$curUser'";
					// 			$res = $mysqli->query($query);
					// 			// if($res->num_rows!=0)
					// 			// {
					// 				while($row = $res->fetch_assoc()) {
					// 					echo"

											
					// 						<div class='col-3' style='background-image: url(gallery/".$row['filename']."); background-size: cover;background-repeat:no-repeat;'>
					// 				</div>
		   										 
		  	// 								";
		  	// 							}
					// 			// }


					// echo "</div>";//gallery div
						
							
							
					}
				//}
				else{
					echo 	'<div class="alert alert-danger mt-3" role="alert">
	  							You are not registered on this site!
	  						</div>';
				}
			}
			
			else if(isset($_POST['submit'])){
				// {$picFile=$_FILES["picToUpload"];
		
				// 		$target="gallery/";
				// 			$file=($picFile["name"]);
				// 			$size=$picFile["size"];
				// 			$type=$picFile["type"];


				// 			// checking the type
				// 			if($type!="image/jpeg"&&$type!="image/pjpeg")
				// 			{
				// 				echo "Wrong type of file!";
				// 			}
				// 			else
				// 			{
				// 				if($size>=(1024*1024))
				// 				{
				// 					echo "File is too big!";
				// 				}
				// 				else//file meets all requirements time to upload
				// 				{
				// 					$fileemail=$_POST['ID'];
				// 					$filepass=$_POST['pass'];
				// 					$UserID;
				// 				//	echo $filepass;
				// 					$query = "SELECT * FROM users WHERE email = '$fileemail' AND password = '$filepass'";
				// 					$res = $mysqli->query($query);
				// 					if($row = mysqli_fetch_array($res))
				// 					{
				// 						$UserID=$row['user_id'];
										
				// 					}

				// 						// $query = "INSERT INTO tbusers (name, surname, email, birthday, password) VALUES ('$name', '$surname', '$email', '$date', '$pass');";

				// 						// $res = mysqli_query($mysqli, $query) == TRUE;
				// 					move_uploaded_file($picFile["tmp_name"],$target . $picFile["name"]);
				// 					//echo $_POST['ID'];
				// 					$query = "INSERT INTO Gallery (user_id, filename) VALUES ('$UserID','$file')";
				// 					$res = $mysqli->query($query);
				// 					if($res)
				// 					//echo "Stored in: " . $target . $picFile["name"];
				// 						//echo htmlentities($_POST['loginEmail']);
				// 					$email=$fileemail;
				// 					$pass=$filepass; 
				// 					//header("Location:login.php");

				// 					$query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
				// $res = $mysqli->query($query);
				// if($row = mysqli_fetch_array($res)){
				// 	echo 	"<table class='table table-bordered mt-3'>
				// 				<tr>
				// 					<td>Name</td>
				// 					<td>" . $row['name'] . "</td>
				// 				<tr>
				// 				<tr>
				// 					<td>Surname</td>
				// 					<td>" . $row['surname'] . "</td>
				// 				<tr>
				// 				<tr>
				// 					<td>Email Address</td>
				// 					<td>" . $row['email'] . "</td>
				// 				<tr>
				// 				<tr>
				// 					<td>Birthday</td>
				// 					<td>" . $row['birthday'] . "</td>
				// 				<tr>
				// 			</table>";
				
				// 	echo 	"<form method='POST' action='login.php' enctype='multipart/form-data'> 
				// 				<div class='form-group'>
				// 					<input type='hidden' name='ID' id='ID' value='".$email."' />
				// 					<input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
				// 					<input type='file' class='form-control' name='picToUpload' id='picToUpload' /><br/>
				// 					<input type='submit' class='btn btn-standard' value='Upload Image' name='submit' />
				// 				</div>
				// 		  	</form>";
						  	
				// 		//	Gallery 
				// 	echo "<h1 class='page-header'>Image Gallery</h1>";
				// 	echo "<div class='row imageGallery'>";
				// 				$curUser=$row['user_id'];
				// 			$query = "SELECT * FROM Gallery WHERE user_id = '$curUser'";
				// 				$res = $mysqli->query($query);
				// 				// if($res->num_rows!=0)
				// 				// {
				// 					while($row = $res->fetch_assoc()) {
				// 						echo"

											
				// 							<div class='col-3' style='background-image: url(gallery/".$row['filename']."); background-size: cover;background-repeat:no-repeat;'>
				// 					</div>
		   										 
		  // 									";
		  // 								}
				// 				// }


				// 	echo "</div>";//gallery div
						
							
							
				// 	}
				// //}
				// else{
				// 	echo 	'<div class="alert alert-danger mt-3" role="alert">
	  	// 						You are not registered on this site!
	  	// 					</div>';
				// }
				// 				}
				// 			}
				echo 	'<div class="alert alert-danger mt-3" role="alert">
	  						Under Constrution
	  					</div>';
			}
					
			else{
				echo 	'<div class="alert alert-danger mt-3" role="alert">
	  						Could not log you in
	  					</div>';
			}
			
		?>
	</div>
</body>
</html>