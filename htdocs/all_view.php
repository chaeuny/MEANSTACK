
 
<!DOCTYPE html>
<?php
	include_once "./config.php";
	include "./db/db_con.php";
	include_once "./login_check.php";

	//$bno = $_GET['idx']; // $bno에 idx값을 받아와 넣음 

	//$sql = mq("select 
	//				 * 
	//		   from 
	//				 board 
	//			"); 
	//$board = $sql->fetch_array();
//<!-- 페이징 구현 -->
/*				if (isset($_GET["page"]))
		$page = $_GET["page"]; //1,2,3,4,5
	else
		$page = 1;
			    	$sql = mq("select
			    					*
			    			   from 
			    					board
			    			");
			    	$total_record = mysqli_num_rows($sql); // 게시판 총 레코드 수z
			  		
			    	$list = 7; // 한 페이지에 보여줄 개수
			  		$block_cnt = 7; // 블록당 보여줄 페이지 개수
			  		$block_num = ceil($page / $block_cnt); // 현재 페이지 블록 구하기
			  		$block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
			    	$block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...
			    	
			    	
			    	$total_page = ceil($total_record / $list); // 페이징한 페이지 수
			    	if($block_end > $total_page){ // 블록의 마지막 번호가 페이지 수 보다 많다면
			    		$block_end = $total_page; // 마지막 번호는 페이지 수
			    	}
			    	$total_block = ceil($total_page / $block_cnt); // 블럭 총 개수
			    	$page_start = ($page - 1) * $list; // 페이지 시작*/
?>
	<head>
		<?php include_once "./fragments/head.php";?>		
	</head>
	<body>
		<!-- 표준 네비게이션 바 (화면 상단에 위치, 화면에 의존하여 확대 및 축소) -->
		<nav class="navbar navbar-default">
			<?php include_once "./fragments/header.php";?>
		</nav>
		<div class="container">
				<h2> <b> 자료 모아보기 </b> </h2>
				<br><br>
				 <?php
				      $jb_conn = mysqli_connect( 'localhost', 'root', '', 'hsh' );
				      $jb_sql = "SELECT * FROM board";
				      $jb_result = mysqli_query( $jb_conn, $jb_sql );
				      while( $jb_row = mysqli_fetch_array( $jb_result ) ) {
				        echo '<p>' .'title :'. $jb_row[ 'title' ] .'<br>'. 'content'.$jb_row[ 'content' ] .'<br>'.'date:'. $jb_row[ 'date' ] .'<br>';
				        if(!empty($jb_row['image_data'])){
				        	 echo "<img src='data:image/jpeg;base64," . base64_encode($jb_row['image_data']) . "' width='550' height='250' />"; 
				        }
				     
				        ?><hr><?php
				      }
				    ?>

</div>
</body>
</html>