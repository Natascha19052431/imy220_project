<?php
  // See all errors and warnings
  error_reporting(E_ALL);
  ini_set('error_reporting', E_ALL);
  $page="1";
  $server = "localhost";
  $username = "u19052431";
  $password = "lcfdbipj";
  $database = "dbu19052431";
  $mysqli = mysqli_connect($server, $username, $password, $database);

  $email = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : false;
  $pass = isset($_POST["loginPass"]) ? $_POST["loginPass"] : false; 
  // if email and/or pass POST values are set, set the variables to those values, otherwise make them false
   // echo $email;
  //  echo $pass;
?>
<?php include_once(header.php) ?>


<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Indie+Flower&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href='../img/favicon.ico' />
  <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  <title>Snippers login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
  <meta charset="utf-8" />
  <meta name="author" content="Natascha Janse van Rensburg">
   <!-- Replace Name Surname with your name and surname  -->
</head>
<body>

  <ul class="nav justify-content-end">
  <li class="nav-item">
    <!-- <button type="button" class="btn" onclick="document.getElementById('cardlog').style.visibility = 'visible'">Login</button> -->
    <a class="nav-link " onclick="document.getElementById('profile').submit()">Home</a>
  </li>
  <li class="nav-item">
    <!-- <button type="button" class="btn btn-link">Register</button> -->
    <a class="nav-link" href="../index.html">Log-Out</a>
  </li>
   <li class="nav-item">
    <!-- <button type="button" class="btn btn-link">About</button> -->
    <a class="nav-link" onclick="">Profile</a>
  </li>
</ul>
  <div class="container">
    <?php
 //   echo $email;
  //  echo "ppoiuyyvbnm";
      if($email && $pass){ 
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        $res = $mysqli->query($query);
        if($row = mysqli_fetch_array($res)){
      

                echo'
        <form action="login.php" method="POST" style="visibility:hidden;" id="profile">';
        echo"
                  <input type='text' name='loginEmail' id='loginEmail' value='".$email."' />
                  <input type='text' name='loginPass' id='pass' value='".$pass."' /><br/>
                      </form>

              ";    
              // echo $row['user_id'];
         $query2 = "SELECT * FROM profiile_pic WHERE user_id = ".$row['user_id'];
        $res2 = mysqli_query($mysqli,$query2);
        $row2 = $res2->fetch_assoc();
       
         // echo mysqli_num_rows ( $res2 ));

                 //      echo   $row2['filename'];  
        // if ( {
        //               $filenammmme=$row2['filename'];
        //             
                   // echo "src='../gallery/".$row2['filename']."'";
        echo"

  <div class='row' >
      <div class='col-12 col-lg-3 ' >
        <!-- <div class='container'> -->
            <div class='card m-1'id='cardlog' >
               <div class='card-header '>
                <div class='row'>
                <h1></h1>
                  <div class='col-4'>
                    ";

                    echo"
                    <img src='../gallery/".$row2['filename']."' alt='profile' class='card-img rounded-circle mb-3'>
                  </div>
                  <div class='col-8'>
                    <h1>". $row['name'] ."'s profile</h1>
                    <p>
                      ".$row['email'] ."<br>
                      ".$row['birthday'] ."<br>
                    </p>
                  </div>
                </div>


                </div>
              
          </div>
        <!-- </div> -->
           <div class='card  m-1'>
           <div class='card-header col-12'>
              Post something 
           </div>
          <form method='POST' action='profilepage.php' enctype='multipart/form-data'> 
             

                  <input type='hidden' name='ID' id='ID' value='".$email."' />
                  <input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
                  <div class='row'>
                   <div class='form-group col-12 '>
                  
                  <input type='file' class='form-control' name='picToUpload' id='picToUpload' /><br/>
                  <label class='form-label' for='Des'>Description:</label>
                   <input type='text' class='form-control' name='Des' id='ID' placeholder='Description' />
                    <label class='form-label' for='hash'>Hashtags:</label>
                  <input type='text' class='form-control' name='hash' id='pass' placeholder='#Snippets' /><br/>

                   <input type='submit' class='btn btn-dark  ml-3 ' value='Upload Image' name='submit' />
                    </div>  </div>
                                </form>

                </div>


                <div class='card  m-1'>
           <div class='card-header col-12'>
              Profile Picture
           </div>
          <form method='POST' action='profilepage.php' enctype='multipart/form-data'> 
             

                  <input type='hidden' name='ID' id='ID' value='".$email."' />
                  <input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
                  <div class='row'>
                   <div class='form-group col-12 '>
                  
                  <input type='file' class='form-control' name='picprofile' id='picToUpload' /><br/>
                  
                   <input type='submit' class='btn btn-dark  ml-3 ' value='Upload Image' name='submit' />
                    </div>  </div>
                                </form>

                </div>


                <div class='card  m-1'>
           <div class='card-header col-12'>
              Post an Albumn
           </div>
          <form method='POST' action='profilepage.php' enctype='multipart/form-data'> 
             

                  <input type='hidden' name='ID' id='ID' value='".$email."' />
                  <input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
                  <div class='row'>
                   <div class='form-group col-12 '>
                  
                  <input type='file' class='form-control' name='picToUpload' id='picToUpload' /><br/>
                   <input type='file' class='form-control' name='picToUpload1' id='picToUpload' /><br/>
                    <input type='file' class='form-control' name='picToUpload2' id='picToUpload' /><br/>
                     <input type='file' class='form-control' name='picToUpload3' id='picToUpload' /><br/>
                      <input type='file' class='form-control' name='picToUpload4' id='picToUpload' /><br/>
                  <label class='form-label' for='Des'>Description:</label>
                   <input type='text' class='form-control' name='Des' id='ID' placeholder='Description' />
                    <label class='form-label' for='hash'>Hashtags:</label>
                  <input type='text' class='form-control' name='hash' id='pass' placeholder='#Snippets' /><br/>

                   <input type='submit' class='btn btn-dark  ml-3 ' value='Upload Image' name='submit' />
                    </div>  </div>
                                </form>

                </div>

      </div>
      <div class='col-12 col-xl-9'>
      <h1 class='page-header'>Your Posts</h1>";
        echo "<div class='row imageGallery'>";
                $curUser=$row['user_id'];
                //echo $curUser;
              $query = "SELECT * FROM Gallery WHERE user_id = '$curUser' order by time_of_pic DESC ";
                $res = $mysqli->query($query);
                //  if($res==false)
                // {echo "no posts";}
                  while($row = $res->fetch_assoc()) {
                    echo" 

                      <div class='card col-12 m-2'>
                        <img class='card-img-top' src='../gallery/".$row['filename']."' alt='Card image cap'>
                        <div class='card-body'>
                          <h5 class='card-title'>".$row['hash']."</h5>
                          <p class='card-text'>
                            ".$row['Description']."
                          </p>
                          
                        </div>
                      </div>
                      
                           
                        ";
                      }
                // }


          echo "</div>";//gallery div


        echo"</div>

 
</div>";
          
              
          }
        //}
        else{
          echo  '<div class="alert alert-danger mt-3" role="alert">
                  You are not registered on this site!
                </div>';
        }
      }
      
      else if(isset($_POST['submit'])){


       //  echo "submitted";//gallery div
            
              $picFile=$_FILES["picToUpload"];
    
            $target="../gallery/";
              $file=($picFile["name"]);
              $size=$picFile["size"];
              $type=$picFile["type"];
              if($type!="image/jpeg"&&$type!="image/pjpeg")
              {
                echo "Wrong type of file!";
              }
              else if($size>=(1024*1024))
                {
                  echo "File is too big!";
                }
              else
              {
                $fileemail=$_POST['ID'];
                  $filepass=$_POST['pass'];
                  $DES=$_POST['Des'];
                  $HASH=$_POST['hash'];
                //  echo $filepass;
                  $UserID;
                //  echo $filepass;
                  $query = "SELECT * FROM users WHERE email = '$fileemail' AND password = '$filepass'";
                  $res = $mysqli->query($query);
                  if($row = $res->fetch_assoc())
                  {
                   // echo "something";
                    $UserID=$row['user_id'];
                    
                  }
                  //echo $UserID;
                  move_uploaded_file($picFile["tmp_name"],$target . $picFile["name"]);
                  //echo $_POST['ID'];
                 // echo $file;
                  $query = "INSERT INTO Gallery (`user_id`, `filename`,`Description`,`hash`) VALUES ('$UserID','$file','$DES','$HASH')";
                  $res = $mysqli->query($query);
                  //$res = mysqli_query($mysqli, $query) == TRUE;
                  if(!res)echo "something wrong";
                //$res = $mysqli->query($query);
            

              ////////////////////////////////////////////////////////////////////////////////
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        $res = $mysqli->query($query);
        if($row = mysqli_fetch_array($res)){
      

                echo'
        <form action="login.php" method="POST" style="visibility:hidden;" id="profile">';
        echo"
                  <input type='text' name='loginEmail' id='loginEmail' value='".$email."' />
                  <input type='text' name='loginPass' id='pass' value='".$pass."' /><br/>
                      </form>

              ";    
              // echo $row['user_id'];
         $query2 = "SELECT * FROM profiile_pic WHERE user_id = ".$row['user_id'];
        $res2 = mysqli_query($mysqli,$query2);
        $row2 = $res2->fetch_assoc();
       
         
        echo"

  <div class='row' >
      <div class='col-12 col-lg-3 ' >
        <!-- <div class='container'> -->
            <div class='card m-1'id='cardlog' >
               <div class='card-header '>
                <div class='row'>
                <h1></h1>
                  <div class='col-4'>
                    ";

                    echo"
                    <img src='../gallery/".$row2['filename']."' alt='profile' class='card-img rounded-circle mb-3'>
                  </div>
                  <div class='col-8'>
                    <h1>". $row['name'] ."'s profile</h1>
                    <p>
                      ".$row['email'] ."<br>
                      ".$row['birthday'] ."<br>
                    </p>
                  </div>
                </div>


                </div>
              
          </div>
        <!-- </div> -->
           <div class='card  m-1'>
           <div class='card-header col-12'>
              Post something 
           </div>
          <form method='POST' action='profilepage.php' enctype='multipart/form-data'> 
             

                  <input type='hidden' name='ID' id='ID' value='".$email."' />
                  <input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
                  <div class='row'>
                   <div class='form-group col-12 '>
                  
                  <input type='file' class='form-control' name='picToUpload' id='picToUpload' /><br/>
                  <label class='form-label' for='Des'>Description:</label>
                   <input type='text' class='form-control' name='Des' id='ID' placeholder='Description' />
                    <label class='form-label' for='hash'>Hashtags:</label>
                  <input type='text' class='form-control' name='hash' id='pass' placeholder='#Snippets' /><br/>

                   <input type='submit' class='btn btn-dark  ml-3 ' value='Upload Image' name='submit' />
                    </div>  </div>
                                </form>

                </div>


                <div class='card  m-1'>
           <div class='card-header col-12'>
              Profile Picture
           </div>
          <form method='POST' action='profilepage.php' enctype='multipart/form-data'> 
             

                  <input type='hidden' name='ID' id='ID' value='".$email."' />
                  <input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
                  <div class='row'>
                   <div class='form-group col-12 '>
                  
                  <input type='file' class='form-control' name='picprofile' id='picToUpload' /><br/>
                  
                   <input type='submit' class='btn btn-dark  ml-3 ' value='Upload Image' name='submit' />
                    </div>  </div>
                                </form>

                </div>


                <div class='card  m-1'>
           <div class='card-header col-12'>
              Post an Albumn
           </div>
          <form method='POST' action='profilepage.php' enctype='multipart/form-data'> 
             

                  <input type='hidden' name='ID' id='ID' value='".$email."' />
                  <input type='hidden' name='pass' id='pass' value='".$pass."' /><br/>
                  <div class='row'>
                   <div class='form-group col-12 '>
                  
                  <input type='file' class='form-control' name='picToUpload' id='picToUpload' /><br/>
                   <input type='file' class='form-control' name='picToUpload1' id='picToUpload' /><br/>
                    <input type='file' class='form-control' name='picToUpload2' id='picToUpload' /><br/>
                     <input type='file' class='form-control' name='picToUpload3' id='picToUpload' /><br/>
                      <input type='file' class='form-control' name='picToUpload4' id='picToUpload' /><br/>
                  <label class='form-label' for='Des'>Description:</label>
                   <input type='text' class='form-control' name='Des' id='ID' placeholder='Description' />
                    <label class='form-label' for='hash'>Hashtags:</label>
                  <input type='text' class='form-control' name='hash' id='pass' placeholder='#Snippets' /><br/>

                   <input type='submit' class='btn btn-dark  ml-3 ' value='Upload Image' name='submit' />
                    </div>  </div>
                                </form>

                </div>

      </div>
      <div class='col-12 col-xl-9'>
      <h1 class='page-header'>Your Posts</h1>";
        echo "<div class='row imageGallery'>";
                $curUser=$row['user_id'];
                //echo $curUser;
              $query = "SELECT * FROM Gallery WHERE user_id = '$curUser' order by time_of_pic DESC ";
                $res = $mysqli->query($query);
                //  if($res==false)
                // {echo "no posts";}
                  while($row = $res->fetch_assoc()) {
                    echo" 

                      <div class='card col-12 m-2'>
                        <img class='card-img-top' src='../gallery/".$row['filename']."' alt='Card image cap'>
                        <div class='card-body'>
                          <h5 class='card-title'>".$row['hash']."</h5>
                          <p class='card-text'>
                            ".$row['Description']."
                          </p>
                          
                        </div>
                      </div>
                      
                           
                        ";
                      }
                // }


          echo "</div>";//gallery div


        echo"</div>

 
</div>";
          //////////////////////////////////
         }
        
        // else{
        //  echo  '<div class="alert alert-danger mt-3" role="alert">
        //          You are not registered on this site!
        //        </div>';
        // }
            
          
      else{
        echo  '<div class="alert alert-danger mt-3" role="alert">
                Could not log you in
              </div>';
      }
      
    ?>
  </div>
</body>
</html>