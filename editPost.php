<html>
<?php

// error_reporting(E_ALL);
	// ini_set('error_reporting', E_ALL);
//echo"hello" ;
	
	$server = "localhost";
	$username = "u19052431";
	$password = "lcfdbipj";
	$database = "dbu19052431";
	$mysqli = mysqli_connect($server, $username, $password, $database);

	$newdescript=$_POST['descript'];
	$newhashtag=$_POST['hashtag'];
	$image=$_POST['image'];
      
	 $query = "UPDATE Gallery SET `Description`='$newdescript', `hash`='$newhashtag' WHERE image_id='$image'";
                  $res = $mysqli->query($query);
                  //$res = mysqli_query($mysqli, $query) == TRUE;
                 // echo $query;
                  if(!$res)echo "something wrong";


 // $query2 = "SELECT * FROM users WHERE user_id = '$user' ";
 //                  $res2 = $mysqli->query($query2);
 //                  $row2 = $res2->fetch_assoc();
 //      // echo'
      //   <form action="login.php" method="POST" style="visibility:hidden;" id="profile">';
      //   echo"
      //             <input type='text' name='loginEmail' id='loginEmail' value='".$row2['email']."' />
      //             <input type='text' name='loginPass' id='pass' value='".$row2['password']."' /><br/>
      //                 </form>

      //         ";   
      //      echo"   <script>document.getElementById('profile').submit()</script>";

?>

</html>