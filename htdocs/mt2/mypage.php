<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>내 정보</title>
<style>
* {margin: 0 auto;}
a {color:#333; text-decoration: none;}
.find {text-align:center; width:500px; margin-top:30px; }
</style>
</head>
<?php  
	if(isset($_SESSION['userid'])){
?>

<body>
	<div class="find">
		<form method="post" action="member_update.php">
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
								<td><input type="text" size="35" name="email" placeholder="이메일" value="<?php echo $_SESSIONmember['email']; ?>"></td>
							</tr>
						</table>
					<input type="submit" value="정보변경" />
			</fieldset>
			<?php } ?>
		</form>
	</div>

<?php } ?>
else{
	echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
}
?>
</body>
</html>