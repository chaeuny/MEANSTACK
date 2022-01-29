<!DOCTYPE html>
<html>
   <head>
      <title>Attend Job Fair!</title>
      <link href="http://jun.hansung.ac.kr/SWP/HW/Jobfair/jobfair.css" type="text/css" rel="stylesheet" />
   </head>

   <body>
   <?php 
     $name = "";
     $email = "";
     $interest = "";
     $gender = "";
     $check =true;

    
    //POST값 변수에 저장
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $name = $_POST["name"];
         $email = $_POST["email"];
         $interest = $_POST["interest"];
         if (!isset($_POST["gender"])) 
         {
             $gender = "";    
         }
         else
         {
             $gender = $_POST["gender"];   
         }
    }

    //이름, 이메일, 흥미, 성별 항목에 대한 체크
    if ($name == "") 
    {   
       $check = false;
    }

    if($email == "")
    {
       $check = false;
    }

    if ($interest == "") 
    {
       $check = false;
    }

    if ($gender == "") 
    {
       $check = false;
    }

    if($check == false)
    {
       echo "<h1>Sorry</h1>
         <p>You didn't fill out the form completely.  <a href=\"jobfair.html\">Try again?</a></p>";
      
       return;
    }
   
    //이름, 이메일 2차 체크
    if (!preg_match("/^[a-zA-Z ]*$/",$name))
    {
       $nameErr = "You didn't provide a vaild name.";
        echo "<h1>Sorry</h1>
         <p>You didn't provide a vaild name.  <a href=\"jobfair.html\">Try again?</a></p>";
        return;
    }
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
    {
        $emailErr = "You didn't provide a e-mail address.";
        echo "<h1>Sorry</h1>
         <p>You didn't provide a e-mail address.  <a href=\"jobfair.html\">Try again?</a></p>";
        return;
    }

    //이메일 중복체크
    $check2 = false;
    $list_file_exist = file_exists("list.txt");
    if ($list_file_exist == true) 
    {
       $anyone=file_get_contents("list.txt");
       $arr = explode("\n",$anyone);
     
       for ($i=0; $i <count($arr)-1; $i++) 
       {
          $arr2 = explode(" : ", $arr[$i]);
           //print_r($arr2);
           //echo $email;
          if ($arr2[1] == $email) 
          {
             echo "<h1>$email</h1>
            <p> You have registered already ! <br><br> Back to <a href=\"jobfair.html\">the front page.</a></p><br><br><hr><br>";
              $check2 = true;
              break;
          }
       } 
   }
       

    if($check2 == false)    
    {
       //정보 등록
       $myfile = fopen("list.txt", "a");
       $txt = $name . " : ".$email. " : ".$interest." : ".$gender."\n";
       fwrite($myfile, $txt);
       fclose($myfile);
       echo "<h2>Thanhs, Job Seeker !</h2>"."<br><br>";
       echo "You successfully reserved a seat! See you then ^.^"."<br><br>";
       echo "Name : ".$name."<br>";
       echo "E-mail : ".$email."<br>";
       echo "Field of interest : ".$interest."<br>";
       echo "Gender : ".$gender."<br>";
       echo "<hr>";
    }

    //정보 출력
    $file = fopen("list.txt", "r");

   while(! feof($file)) {
     $line = fgets($file);
     echo $line. "<br>";
   }

   fclose($file);
   
   ?>
               
</body>
</html>
    