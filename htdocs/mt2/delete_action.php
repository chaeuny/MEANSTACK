<?php
    $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
    session_start();
    $number = $_GET['number'];
    $title = $_GET['title'];
    $content = $_GET['content'];

    $date = date('Y-m-d H:i:s');

                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
                $title = $rows['title'];
                $content = $rows['content'];
                $usrid = $rows['id'];

     if(!isset($_SESSION['userid'])) {

        ?>              
        <script>
             alert("로그인 후 작업 할 수 있습니다.");
             location.replace("./view.php?number=<?=$number?>");
        </script>
        <?php   
     }
        
     else if($_SESSION['userid']==$usrid) {
        ?><?php
             $query = "DELETE FROM `board` WHERE `board`.`number` = $number";
             //$result = $connect->query($query);
             $result = mysqli_query($connect, $query);

    }

     else {
        ?>              
        <script>
              alert("본인의 글이 아닙니다.");
              location.replace("./view.php?number=<?=$number?>");
        </script>
        <?php   
    }




    if($result) {
    ?>
        <script>
            alert("삭제되었습니다.");
           location.replace("./index.php");
        </script>
    <?php    
    }

    else {
        ?>
        <script>
        alert("삭제 실패");
        location.replace("./view.php?number=<?=$number?>");
        </script>
        <?php
    }
?>