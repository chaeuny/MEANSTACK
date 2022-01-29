<?php
	include "./config.php";
	include "./db/db_con.php";
  $con = mysqli_connect("localhost","root","","hsh") or die(mysqli_connect_error());
  $name = $userid;

	$bno = $_POST['idx']; // $bno(hidden)에 idx값을 받아와 넣음
	$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT); // 입력받은 패스워드를 해쉬값으로 암호화
	$date = date('Y-m-d'); 
	$title = $_POST['title'];
	$content = $_POST['content'];

if(!empty($_FILES['image']['name'])) {
          $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);
         
         mq("UPDATE 
			board 
	   set 
			image_name = '".$image_name."',
			image_data = '".$image_data."'
			date = '".$date."', 
			pw='".$userpw."',
			title='".$_POST['title']."',
			content='".$_POST['content']."' 
	   where 
			idx='".$bno."'
	");
          if($image_size == FALSE) {
          	?><script>alret("That's not an image.");</script>
             <?php
             } 

      }


else{
	mq("UPDATE 
			board 
	   set 
			pw = '".$userpw."', 
			title='".$_POST['title']."',
			content='".$_POST['content']."'
			date ='".$date."',
	   where 
			idx='".$bno."'
	");


}
	/* 받아온 idx값을 선택해서 게시글 수정 */


?>


	<script>
		alert("수정되었습니다.");
	</script>
	<!--<meta http-equiv="refresh" content="0 url=/read.php?idx=<?=$bno?>">-->