<!DOCTYPE html>
<html>
<body>
								<h1> HW4 </h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

								<h3>Question 1</h3>
<p>[Date] Web Server Programming 수업은 9월7일부터 시작하여 매주 월요일 15주간 계속 됩니다. 수업이 있는 날을 차례대로 출력하는 php 코드를 작성하시오.<br> 이 때 시작일과 지간(즉, 몇 주인 지를)는 form 을 통해 입력 받도록 해야한다.</p>

<input type="text" name="month1">월 /
<input type="text" name="day1">일 부터
<input type="text" name="week1">주간  수업을 진행 


								<h3>Question 2</h3>
<p>[Date] 생일 카운트다운을 하는 스크립트를 작성하시오. <br>사용자로부터 생일의 월과 일을 입력받은 후, 현재 날짜와 생일 사이의 날짜 수를 카운트해서 출력하게 하시오.</p>

생일 입력>>
	<input type=text name=month2>월 /
	<input type=text name=day2>일

								<h3>Question 3</h3>
<p>[Date]  세계의 여러 주요 도시의 현재 시간을 보여주는 코드를 작성하시오. <br>원하는 도시는 드롭다운(Dorp-down)형식으로 선택할 수 있어야 하며, 메뉴에는 적어도 3개 도시(서울/런던/파리/워싱턴 등)이상의 선택이 가능하며, 결과는 날짜와 시간이 보이도록 합니다.</p>

	<label for="city"> City >></label>
	<select id='city' name="city">
	<option value="seoul">seoul</option>
	<option value="london">london</option>
	<option value="paris">paris</option>
	</select>

<input type="submit" name="submit">
</form>



<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
////Question 1
	$startdate ="13:00  ".$_POST['month1']." ". $_POST['day1']."  2020";//사용자가 입력한 날짜 
	$week = $_POST['week1']." weeks"; // 입력받은 주 
		$startdate = strtotime($startdate);
		$enddate=strtotime($week, $startdate);
		echo "Question 1"."<br>";
		echo "******수업일정********"."<br>";
			while ($startdate < $enddate) {
  				echo">>".date("Y-m-d H:i:sa", $startdate) . "<br>";
  				$startdate = strtotime("+1 week", $startdate);
			}

////Question 2
$time = mktime(0,0,0,date("m"), date("d"),0)-mktime(0,0,0, $_POST['month2'], $_POST['day2'],0);
$day = ceil($time / ( 60 * 60 * 24 ));
if($day<0){
   $day=abs($day);
}
else{
   $day="-".$day;
}





echo "<br>"."Question 2";
echo "<br>"."생일까지".$day."일". "<br><br>";


/// Question3
if($_POST['city']=="seoul"){
	echo "Question 3"."<br>";
	date_default_timezone_set("Asia/Seoul");
	echo "Seoul Time & Date >> ";
	echo date("Y-m-d h:i:sa")."<br>";
}
else if($_POST['city']=="london"){
		echo "Question 3"."<br>";
	date_default_timezone_set("Europe/London");
	echo "London Time & Date >> ";
	echo date("Y-m-d h:i:sa")."<br>";
}
else if($_POST['city']=="paris"){
		echo "Question 3"."<br>";
	date_default_timezone_set("Europe/Paris");
	echo "Paris Time & Date >> ";
	echo date("Y-m-d h:i:sa")."<br>";
}
}
?>

</body>
</html>