 <?php    

    $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
      
        session_start();
      //수정하기를 누르면 id와 게시판 번호로 게시물을 조회하여 조회한 게시물 아이디와 현재 세션 아이디가 같으면 수정을 허용함 
                $number = $_GET['number'];
                $id = $_GET['id'];
                $query = "SELECT title, content, date, id from board where number=$number";

                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
                // $db->query($sql);
 
                $title = $rows['title'];
                $content = $rows['content'];
                $usrid = $rows['id'];

                $URL = "./index.php";
 
                if(!isset($_SESSION['userid'])) {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("./view.php?number=<?=$number?>");
                        </script>
        <?php   }
        
                else if($_SESSION['userid']==$usrid) {
        ?>
        <form method = "GET" action = "modify_action.php">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 글수정</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                <tr>
                        <td>작성자</td>
                        <td><input type="hidden" name="id" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
                        </tr>
 
                        <tr>
                        <td>제목</td>
                        <td><input type = text name = title size=60 value="<?=$title?>"></td>
                        </tr>
 
                        <tr>
                        <td>내용</td>
                        <td><textarea name = content cols=85 rows=15><?=$content?></textarea></td>
                        </tr>
 
                        </table>
 
                        <center>
                        <input type="hidden" name="number" value="<?=$number?>">
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        <?php   }

                else {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("./view.php?number=<?=$number?>");
                        </script>
        <?php   }
        ?>