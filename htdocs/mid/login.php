<!DOCTYPE html>
<?php
session_start();

$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'users_db';

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   if (empty($_POST['username'])) {
       echo "<script> alert('Please enter your name!')</script>";
   }
   if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your password!')</script>";
   }

   $query = "SELECT name, pass FROM users WHERE name='$username' AND pass='$password' ";
   $result = mysqli_query($conn,$query);
   if ( mysqli_num_rows($result) > 0 ) {
       $_SESSION['login']=$username;
       header("Location: content.php");
   } else {
       echo "Wrong username or password !";
   }

mysqli_close($conn);
}
?>
<html>
<head>
   <title> Login Page </title>
</head>
<body style="text-align:center; ">
   <form method="post" action="login.php">
   <table border="2" align="center">
       <tr>
           <th colspan="2" align="center"> Login </th>
        </tr>
            <td width="100"> Username </td>
            <td> <input type="text" name="username" > </td>
       </tr>
       <tr>
            <td width="100"> Password </td>
            <td> <input type="password" name="password" > </td>
       </tr>
       <tr>
            <td colspan="2" align="center"> <input type="submit" name="submit" value="Login" > </td>
       </tr>
   </table>
   <form>
    <b> Not registered yet? <a href="registration.php"> Registeration </a></b>
</body>
</html>