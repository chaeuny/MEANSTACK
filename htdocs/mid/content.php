<!DOCTYPE html>

<?php

	session_start();
		if (!isset($_SESSION['login'])) {
       		 header("Location: login.php");
    	}
?>

<html>
<head>
    <title> HSU Coding Q&A  </title>
</head>

<body>
	<h1 style="text-align:center; ">  HSU Coding Q&A  </h1>

	<h3 style="text-align:right; "> Welcome <?=$_SESSION['login']?>!</h3> <b> <a href="./logout.php" align="right"> Logout </a> </b> <br>
	<hr>

		//image 업로드 //name->image_name

	<form action="content.php" method="POST" enctype="multipart/form-data"> 
        File :
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
    </form>
   
    <?php
   
    $con = mysqli_connect("localhost","root","","users_db") or die(mysqli_connect_error());
   
    $olds = mysqli_query($con, "SELECT * FROM images");
   
    if(isset($_POST['submit'])) {
       if(empty($_FILES['image']['name'])) {
          echo "<h2>Please select an image.</h2>";
       } else {
          $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);
         
          if($image_size == FALSE) {
             echo "<h2>That's not an image.</h2>";
             } else {
             $sql = "INSERT INTO images VALUES (NULL,'$image_name','$image_data')" ;
               
             if ( !mysqli_query($con,$sql) ) {
                 echo "Problem in uploading image !." . mysqli_error($con);
             } else {
                echo "<h2> Newly uploaded Image : $image_name </h2>";
               echo "<img width='250' height='200' src='get.php?name=$image_name'>";
              
            }
         }
      }
   }
   
   echo "<h2> Previously Uploaded Pictures </h2>";
   while ( $one = mysqli_fetch_array($olds) ) {
      echo "<img src='data:image/jpeg;base64," . base64_encode($one['data']) . "' width=250 height=200 />" ;
      echo "<a href='delete.php?id=" . $one['id'] . "'> Delete </a> <br>";
   }
   mysqli_close($con);
?>

</body>
</html>
