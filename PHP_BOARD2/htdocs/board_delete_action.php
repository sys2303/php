<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>board_delete.php</title>
	</head>
	<body>
		<h1>board_delete_action.php</h1>
	<?php
	$board_no =$_POST["board_no"];
	$board_pw =$_POST["board_pw"];
	echo "board_no : " .$board_no . "<br>";
	echo "board_pw : " .$board_pw . "<br>";
	
	$conn = mysqli_connect("localhost","root","","test");
	if($conn) {
	   echo "연결성공<br>";
	} else{
	    die("연결실패:".mysqli_error());
	}
	try{
	    $selectSql = "SELECT * FROM board WHERE board_pw='" . $board_pw
	    ."' AND board_no=" . $board_no . "";
	    $result = mysqli_query($conn, $selectSql);
	if($row = mysqli_fetch_array($result)) {
	   $deleteSql="DELETE FROM board WHERE board_pw='"
	   .$board_pw."'AND board_no=".$board_no."";
	   $res = mysqli_query($conn, $deleteSql);
	   echo "삭제성공: " . $deleteSql .":"."실행완료~~";
	}
	else{
	    echo"삭제실패!";
	}
	
	}catch (Exception $e) {
	    echo "삭제실패:" . mysqli_error($conn);
	    $s= $e->getMessage().'(오류코드:' .$e->getCode() . ')';
	    echo $e;
	}
	mysqli_close($conn);
	?>
	</body>
</html>