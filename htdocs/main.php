<?php
	include_once "./config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "./fragments/head.php";?>
	
	</head>
	<body>
		<!-- 표준 네비게이션 바 (화면 상단에 위치, 화면에 의존하여 확대 및 축소) -->
		<nav class="navbar navbar-default">
			<?php include_once "./fragments/header.php";?>
		</nav>
		<div class="container">
			<div class="jumbotron">
				<div class="container">
					<h1>웹 사이트 소개</h1>
					<p>이 웹 사이트는 프로그래밍 공부에 도움 받을 수 있는 홈페이지 입니다.</p>
					<p><a class="btn btn-primary btn-pull" href="list.php" role="button">게시판 바로가기</a></p>
				
				</div>
			</div>
		</div>
		<div class="container"> 
    		<div id="carousel-example-generic" class="carousel slide">
            <!-- Indicators(이미지 하단의 동그란것->class="carousel-indicators") -->
            	<ol class="carousel-indicators">
	              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	            </ol>
	            <!-- Carousel items -->
	            <div class="carousel-inner">
	            	<div class="item active">
                		<img src="https://t1.daumcdn.net/cfile/tistory/99C94E495C81F1AA0F" width="1200" height="400" alt="First slide">
                	</div>
	                <div class="item">
	                   <img src="https://lh3.googleusercontent.com/proxy/hIMXb529uqOkId5Y1YFF17u5eitrQUhmhfjY4ixkwwBYiHpbx9GvplUifLQsmjjBMeNgENBPW-bo5_jPn7lbod5mbNp3JsQVQ8pxyJpQHmb9vP4" width="1200" height="400" alt="Second slide">               
	                </div>
	                <div class="item">
	                   <img src="https://image.techit.kr/2019/11/30/32f24c2582a4cf20d8f0f4316854d7c5.jpg" width="1200" height="400" alt="Third slide">                 
	                </div>
             	</div>
             	<!-- Controls -->
              	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                	<span class="icon-prev"></span>
              	</a>
              	<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                	<span class="icon-next"></span>
              	</a>
          	</div>
  		</div>
  		<!-- JS 코드는 밑에 두는걸 권장 -->
  		<script src="./js/login.js"></script> 
		<script>
// 			$(function(){
// 				 $(".carousel").carousel(){ // 캐러셀 jQuery
// 					interval: 1000;
// 				 }); 
// 			});
		</script>
	</body>
</html>