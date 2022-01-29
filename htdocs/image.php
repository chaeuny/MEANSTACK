<!DOCTYPE html>
<html>
<head>
<title> Image Uploading Example </title>
</head>
<body>
    <form action="image.php" method="POST" enctype="multipart/form-data">
        File :
        <input type="file" name="image">

        <input type="submit" name="submit" value="Upload">//글쓰기버튼과 같음

    </form>
   
    <?php
   
    $con = mysqli_connect("localhost","root","","hsh") or die(mysqli_connect_error());
   
    $olds = mysqli_query($con, "SELECT * FROM images");
   
    if(isset($_POST['submit'])) {
       if(!empty($_FILES['image']['name'])) { //받아온 파일이 없 으면 
          $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);
         
          if($image_size == FALSE) { //받아온 파일이 이미지가 아니면 
             echo "<h2>That's not an image.</h2>";
             } 

             else { //받아온파일이 이미지 파일이면 
             $sql = "INSERT INTO images VALUES (NULL,'$image_name','$image_data')" ;
               
             if ( !mysqli_query($con,$sql) ) {
                 echo "Problem in uploading image !." . mysqli_error($con);
             } else {
                echo "<h2> Newly uploaded Image : $image_name </h2>";
               echo "<img width='250' height='250' src='get_image.php?name=$image_name'>";
            }
         }
      }
   }
   
   //echo "<h2> Previously Uploaded Pictures </h2>";
   //while ( $one = mysqli_fetch_array($olds) ) {
     // echo "<img src='data:image/jpeg;base64," . base64_encode($one['data']) . "' width=250 height=200 />" ;
     // echo "<a href='delete_image.php?id=" . $one['id'] . "'> Delete </a> <br>";
   //}
   mysqli_close($con);
?>
</body>
</html>