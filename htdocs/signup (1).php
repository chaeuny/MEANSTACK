<!DOCTYPE html>
<html>
   <head>
      <title>Attend Job Fair!</title>
      <link href="http://jun.hansung.ac.kr/SWP/HW/Jobfair/jobfair.css" type="text/css" rel="stylesheet" />
   </head>

   <body>

   <?php
               if(isset($_POST["name"]))
               {
                 $name= $_POST["name"];
               }

               if(isset($_POST["email"]))
               {
                 $email= $_POST["email"];
               }

               if(isset($_POST["interest"]))
               {
                  $interest= $_POST["interest"];
               }

               if(isset($_POST["gender"]))
               {
                 $gender= $_POST["gender"];
               }

   $name = $email = $interest = $gender="";

   if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["interest"]) || empty($_POST["gender"]))
   {
      echo "<h1>Sorry</h1>";
      echo "You didn't fill out the form completely. "."<a href='jobfair.html'>Try again?</a>";
  }

   else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["name"]))
   {
      echo "<h1>Sorry</h1>";
      echo "You didn't provide a name. "."<a href='jobfair.html'>Try again?</a>";
   }

   else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["email"]))
   {
     echo "<h1>Sorry</h1>";
     echo "You didn't provide a e-mail address. "."<a href='jobfair.html'>Try again?</a>";
   }

   else{
     $guestlist =  fopen("list.txt", "r") or die("Unable to open file!");
     $new = true;
         while(!feof($guestlist)) {
                           error_reporting(E_ERROR | E_WARNING | E_PARSE);
                           list($name,$email,$interest,$gender) = explode(":",fgets($guestlist));
   if(trim($name) == $_POST["name"] || trim($email) == $_POST["email"]){
     $new = false;
   }
}
                           fclose($guestlist);
   if($new == true){
      $guestlist =  fopen("list.txt", "a");
                           fwrite($guestlist, "\n".$_POST["name"]." : ".$_POST["email"]." : ".$_POST["interest"]." : ".$_POST["gender"]);
                           fclose($guestlist);
        echo "<h1>Thanks, Job Seeker !</h1>";
        echo "You successfully reserved a seat! See you then^.^ <br><br>";
        echo "<b>Name: </b>".$_POST["name"]. "<br>";
        echo "<b>E-mail: </b>".$_POST["email"]. "<br>";
        echo "<b>Field of interest: </b>".$_POST["interest"]. "<br>";
        echo "<b>Gender: </b>".$_POST["gender"]. "<br>";
        echo "<hr/>";
        echo "<b>Current reservation list<br><br></b>";
$i = 0;

$guestlist =  fopen("list.txt","or");

        error_reporting(E_ERROR | E_WARNING | E_PARSE);
                while(!feof($guestlist)) {
      list($name,$email,$interest,$gender) = explode(":",fgets($guestlist));
  }
  if($i>0)
  {
    echo $i.". ";
    echo trim($name)." : ".trim($email)." : ".trim($interest)." : ".trim($gender)." <br>";
    $i++;
 }
         fclose($a);
}
  else
  {
    echo "<h1>Sorry</h1>";
    echo "You already exist. "."<a href='jobfair.html'>"."Try again?"."</a>";
  }
}
     ?>
   </body>
</html>