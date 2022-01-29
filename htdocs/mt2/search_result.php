<!DOCTYPE html>
<?php 
  //include $_SERVER['DOCUMENT_ROOT']."/index.php";
  $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
?>

<head>
    <meta charset="UTF-8">
    <title>게시판</title>
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

      .fo_re {
          font-weight: bold;
          color:red;
          margin-left: 15px; 
      }
      #search_box {
        margin-top:30px;
        text-align: right;
      }
      #search_box2 {
      text-align: center;
      margin-top: 30px;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
<div> 
<!-- 18.10.11 검색 추가 -->

<?php
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>

  <br>
  <h1 align="center"><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>

  <h4 style="margin-top:30px;">

  <a href="/index.php" align="center">홈으로</a></h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>

        

        <!--- 추가부분 18.08.01 --->
        <?php
          $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
          $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음
          
          if($boardtime==$timenow){
            $img = "<img src='https://ssl.pstatic.net/static/cafe/cafe_pc/ico_new.png' alt='new' title='new' />";
          }
          else{
            $img ="";
          }
          ?>


        <!--- 추가부분 18.08.01 END -->
        <a href='index.php?id=<?php echo $board["id"]; ?>'>
          <span style="background:yellow;">
            <?php echo $title; ?>
            </span>

            <span class="re_ct">
              [<?php echo $rep_count;?>]
              <?php echo $img; ?> 
            </span>
          </a></td>

          <td width="120"><?php echo $board['id']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>

        </tr>
      </tbody>
    </table>



    <!-- 18.10.11 검색 추가 -->
    <div id="search_box2">
      <form action="search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="id">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
    </form>
  </div>
</div>
</body>
</html>