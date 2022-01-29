<!DOCTYPE html>
        <?php   
               $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
                 
                $number = $_GET['number'];
                session_start();
   $query = "select title, content, date, hit, id from board where number =$number";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
        ?>

 <head>

         <title> View </title>
 <style>
.view_table {
border: 1px solid #444444;
margin-top: 30px;
}
.view_title {
height: 30px;
text-align: center;
background-color: #cccccc;
color: white;
width: 1000px;
}
.view_id {
text-align: center;
background-color: #EEEEEE;
width: 30px;
}
.view_id2 {
background-color: white;
width: 60px;
}
.view_hit {
background-color: #EEEEEE;
width: 30px;
text-align: center;
}
.view_hit2 {
background-color: white;
width: 60px;
}
.view_content {
padding-top: 20px;
border-top: 1px solid #444444;
height: 500px;
}
.view_btn {
width: 700px;
height: 200px;
text-align: center;
margin: auto;
margin-top: 50px;
}
.view_btn1 {
height: 50px;
width: 100px;
font-size: 20px;
text-align: center;
background-color: white;
border: 2px solid black;
border-radius: 10px;
}
.view_comment_input {
width: 700px;
height: 500px;
text-align: center;
margin: auto;
}
.view_text3 {
font-weight: bold;
float: left;
margin-left: 20px;
}
.view_com_id {
width: 100px;
}
.view_comment {
width: 500px;
}

</style>
 </head>


 
 <body>

         <table class="view_table" align=center>
                <tr>
                        <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
                </tr>
                <tr>
                        <td class="view_id">작성자</td>
                        <td class="view_id2"><?php echo $rows['id']?></td>
                        <td class="view_hit">조회수</td>
                        <td class="view_hit2"><?php echo $rows['hit']?></td>
                </tr>
         
         
                <tr>
                        <td colspan="4" class="view_content" valign="top">
                        <?php echo $rows['content']?></td>
                </tr>
                </table>
         
         
       <!-- MODIFY & DELETE -->
       <div class="view_btn">
        <button class="view_btn1" onclick="location.href='./index.php'">목록으로</button>

        <button class="view_btn1" onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>
         
        <button class="view_btn1" onclick="location.href='./delete_action.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>

       </div>

  <!-- REPLE -->
       <div class="reply_view">
    <h3>댓글목록</h3>
        <?php
            $sql3 = mq("select * from reply where board_num='".$bno."' order by idx desc");
            while($reply = $sql3->fetch_array()){ 
        ?>
        <div class="dap_lo">
            <div><b><?php echo $reply['id'];?></b></div>
            <div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
            <div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
            <div class="rep_me rep_menu">
                <a class="dat_edit_bt" href="#">수정</a>
                <a class="dat_delete_bt" href="#">삭제</a>
            </div>


            <!-- 댓글 수정 폼 dialog -->
            <div class="dat_edit">
                <form method="post" action="rep_modify_ok.php">
                    <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                    <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
                    <textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
                    <input type="submit" value="수정하기" class="re_mo_bt">
                </form>
            </div>


            <!-- 댓글 삭제 비밀번호 확인 -->
            <div class='dat_delete'>
                <form action="reply_delete.php" method="post">
                    <input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                    <p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
                 </form>
            </div>
        </div>
    <?php } ?>

    <!--- 댓글 입력 폼 -->
    <div class="dap_ins">
        <form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
            <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
            <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
            <div style="margin-top:10px; ">
                <textarea name="content" class="reply_content" id="re_content" ></textarea>
                <button id="rep_bt" class="re_bt">댓글</button>
            </div>
        </form>
    </div>
</div>
<!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>
 </body>
 </html>