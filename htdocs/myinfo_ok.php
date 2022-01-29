   <?php
    include_once "./db/db_con.php"; //mq 함수 사용
    include "./config.php"; // 세션관리용 
      //
   $bno = $_POST['num']; // $bno(hidden)에 idx값을 받아와 넣음
    //$id   = $_POST['userid'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // 입력받은 패스워드를 해쉬값으로 암호화
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email  = $_POST['email'];


    mq("UPDATE  
      user
      set 
        pass = '".$pass."',
        name = '".$name."',
        gender = '".$gender."',
        phone = '".$phone."',
        email = '".$email."'
      where 
            num ='".$bno."'
  ");
    

    //echo "
    //    <script>
       //     alert('정보수정이 완료 되었습니다.');
     //     location.href = 'index.php';
     //   </script>
   // ";

    ?>
<script>
    alert("수정되었습니다. 다시 로그인하세요");
  </script>
  <meta http-equiv="refresh" content="0 url=/logout.php">
