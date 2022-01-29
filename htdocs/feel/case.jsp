
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<center>
	<h1>계산</h1>
	<h3>선택한 상품 목록</h3>
	<hr>
	<% 
		ArrayList<String> mylist = (ArrayList)session.getAttribute("mylist");
		String[] fruits = {"레몬","수박","사과","딸기","참외"};
		
		int[] countlist = (int[])session.getAttribute("countlist");
		
		for(int i = 0; i < countlist.length; i++) { 
			if (countlist[i] != 0) {%>
			<h3><%=fruits[i]%> : <%=countlist[i] %>개</h3>
			
		<% } 
		}%>
		
		
	<a href="select.jsp">이전 페이지</a>
	<form name="logout" action="logout.jsp" method="post">
		<input type="submit" value="로그아웃">
	</form>
	
</center>
</body>
</html>
