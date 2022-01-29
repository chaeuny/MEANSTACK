<!DOCTYPE html>
<html>
<head>
<title> Image Uploading Example </title>
</head>
<body>
    <form action="image.php" method="POST" enctype="multipart/form-data">
        File :
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
    </form>
   
    <?php
   
    $con = mysqli_connect("localhost","root","","my_db") or die(mysqli_connect_error());
   
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
                // [option-1] using separate php file
               echo "<img width='250' height='200' src='get.php?name=$image_name'>";

                // [option-2] using direct display
                // $image = mysqli_query($con, "SELECT * FROM images WHERE name='$image_name'");
                // $image = mysqli_fetch_array($image);
                //echo "<img src='data:image/jpeg;base64," . base64_encode($image['data']) . "' width='250' height='200' />";

              
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