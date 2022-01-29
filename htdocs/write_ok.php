<?php
	include "./config.php";
	include "./db/db_con.php";
	   $con = mysqli_connect("localhost","root","","hsh") or die(mysqli_connect_error());
	$name = $userid;
	$date = date('Y-m-d');
	$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT); // 입력받은 패스워드를 해쉬값으로 암호화
	$title = $_POST['title'];
	$content = $_POST['content'];

	       if(!empty($_FILES['image']['name'])) {
          $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);
         
          if($image_size == FALSE) {
          	?><script>alret("That's not an image.");</script>
             <?php
             } 

            // else {
            // $sql = "INSERT INTO board (image_name,image_data) VALUES ('$image_name','$image_data')" ;
               //$bno = $_GET['idx']; 
             //if ( !mysqli_query($con,$sql) ) {
               //  echo "Problem in uploading image !." . mysqli_error($con);
             //} else {
             //  echo "<img width='250' height='200' src='get_image.php?name=$name'>";
            //}
         //}
      }


	/* lo_post 값이 1이면 잠금 0이면 공개 */
	if(isset($_POST['lockpost'])){
		$lo_post = '1';
	}else{
		$lo_post = '0';
	}


	
	//$sql = mq("insert into board(name,pw,title,content,date) 
 	//		values('".$_POST['name']."','".$userpw."','".$_POST['title']."','".$_POST['content']."','".$date."')"); 
	
	 mq("alter table board auto_increment =1"); //auto_increment 값 초기화 (삭제 시 번호 비지 않게 하기 위해서)
	
	mq("INSERT 
			board
		SET	
			name = '".$name."', 
			pw = '".$userpw."', 
			title = '".$title."', 
			content = '".$content."',  
			date ='".$date."',
			lock_post = '".$lo_post."',
			image_name = '".$image_name."',
			image_data = '".$image_data."'
	");

?>
	<script>
		alert("글쓰기 완료되었습니다.");
		location.href = 'list.php';
	</script>
