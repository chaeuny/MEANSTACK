
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>alert</title>
</head>
<body>

	<%
	String fruit = request.getParameter("fruits");
	ArrayList mylist = (ArrayList)session.getAttribute("mylist");
	mylist.add(fruit);
	session.setAttribute("mylist", mylist);
	
	int count = Integer.parseInt((String)request.getParameter("count"));
	int[] countlist = (int[])session.getAttribute("countlist");
	
	if (fruit.equals("레몬")) {
		countlist[0] += count;			
	}
	else if (fruit.equals("수박")) {
		countlist[1] += count;
	}
	else if (fruit.equals("사과")) {
		countlist[2] += count;
	}
	else if (fruit.equals("딸기")) {
		countlist[3] += count;
	}
	else if (fruit.equals("참외")) {
		countlist[4] += count;
	}
	
	session.setAttribute("countlist",countlist);
	%>


	<script>
	alert("<%=fruit%> <%=count%>개가 추가되었습니다.");
	history.go(-1);
	</script>


</body>
</html>