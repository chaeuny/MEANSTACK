<?php    

    $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());
      
        session_start();
      //수정하기를 누르면 id와 게시판 번호로 게시물을 조회하여 조회한 게시물 아이디와 현재 세션 아이디가 같으면 수정을 허용함 
      // 정보수정을 누르면 현재 세션 아이디의 정보를 가져옴. (게시글 수정과 유사)
        // mypage = modify , member_update = modify_action
        // 원본은 mypage.php 를 참고 
                // $number = $_GET['number'];
                $id = $_GET['id'];
                $query = "SELECT email, pw  from member where id=$id";

                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);

 				$usrid = $rows['id'];
                $pw = $rows['pw'];
                $email = $rows['email'];
                

                $URL = "./index.php";
 
                if(!isset($_SESSION['userid'])) {
        ?>              <script>
                                alert("권한이 없습니다.");
                                history.back();
                        </script>
        <?php   }
        
                else if($_SESSION['userid']==$usrid) {
        ?>
<form method="post" action="member_update.php">
   <div class="find">
			<?php
				
				$sql = mq("select * from member where id='{$_SESSION['userid']}'");
				while($member = $sql->fetch_array()){
					?>
			<h1>내 정보</h1>
			<p><a href="index.php">홈으로</a></p>
				<fieldset>
					<legend>마이페이지</legend>
						<table>
							<tr>
								<td>아이디</td>
								<td><input type="text" size="35" name="userid" value="<?php echo $_SESSION['userid'];?>" disabled></td>
							</tr>
							<tr>
								<td>비밀번호</td>
								<td><input type="password" size="35" name="pw" placeholder="비밀번호"></td>
							</tr>
							<tr>
								<td>이메일</td>
								<td><input type="text" size="35" name="email" placeholder="이메일" value="<?php echo $_SESSION['email']; ?>"></td>
							</tr>
						</table>
					<input type="submit" value="정보변경" />
			</fieldset>
			<?php 
		} 
			?>
	</div>
</form>