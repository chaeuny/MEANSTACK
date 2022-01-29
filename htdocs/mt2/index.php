<!DOCTYPE html>

 <?php
                $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
                $query ="select * from board order by number desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);
 
                session_start();
 
                if(isset($_SESSION['userid'])) {
                        echo $_SESSION['userid'];?>님 안녕하세요 <b> 
                            <button><a href="./logout.php" align="right"> Logout </a> </b></button>
                <button> <font style="cursor: hand"onClick="location.href='./mypage2.php'"><b> 회원 정보 수정</b></font></button>
                        <br/>
        <?php
                }
                else {
        ?>              <button onclick="location.href='./login.php'">로그인</button>
                        <br/>
        <?php   }
        ?>

<html> 
<head>
        <meta charset = 'utf-8'>
  <style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>
        <title> Index </title>
</head>


<body background="black">
     <h1 style="text-align:center; "> " 강의 게시판 :: ______________  "  </h1>     <br> <hr>
<?php
                $connect = mysqli_connect("localhost","root","","mid") or die (mysqli_connect_error());
                // $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
                $query ="select * from board order by number desc";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);
 
        ?>
        <h2 align=left> Q & A </h2>
        
        <br>
        <table align = center>
        <thead align = "center">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "50" align = "center">조회수</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "view.php?number=<?php echo $rows['number']?>">
                <?php echo $rows['title']?></td>
                  <td width = "100" align = "center"><?php echo $rows['id']?></td>
                <td width = "200" align = "center"><?php echo $rows['date']?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>

        <div class = text>
        <font style="cursor: hand"onClick="location.href='./write.php'"><b>글쓰기</b></font>
        </div>
        

        <div id="search_box" align="center"> 
            <form action="search_result.php" method="get">
                <select name="catgo">
                    <option value="title"> 제목 </option>
                    <option value="id"> 작성자 </option>
                    <option value="content"> 내용 </option>
                </select>
                <input type="text" name="search" size="30" required="required"/> 
                <button> Search </button> 
            </form>
        </div>


  </div>
</body>
</html>
