
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>select</title>
</head>
<body>
<center>
	
		if (request.getParameter("id") != null){
			
			String id = request.getParameter("id");
			ArrayList mylist = new ArrayList();
			
			session.setAttribute("id",id);
			session.setAttribute("mylist",mylist);
			
			int[] countlist = {0,0,0,0,0};
			session.setAttribute("countlist",countlist);
		}

	
	
	<h1>상품선택</h1>
	<hr>
	session.getAttribute("id") %>님이 로그인 한 상태입니다. =session.getAttribute("id")
	<hr>
	<form name="form2" action="alertpage.jsp" method="post">
		<select name="fruits">
			<option value="레몬">레몬</option>
			<option value="수박">수박</option>
			<option value="사과">사과</option>
			<option value="딸기">딸기</option>
			<option value="참외">참외</option>
		</select>
		<input type="text" name="count">
		<input type="submit" value="추가"><br>
		<a href="case.jsp">장바구니</a>
	</form>
	<form name="logout" action="logout.jsp" method="post">
		<input type="submit" value="로그아웃">
	</form>

</center>
</body>
</html>