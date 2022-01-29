<?php

	 $connect = mysqli_connect("localhost","root","","mid") or die(mysqli_connect_error());

    $bno = $_GET['idx'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
    
    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){
        $sql = mq("insert into reply(board_number,id,pw,content) values('".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='./view.php?number=<?=$number?>';</script>";
    }
    else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?> 