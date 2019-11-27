<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>board_list.php</title>
<link rel="stylesheet" href="./css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script
	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script
	src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
    	stateSave: true,
    	"scrollX": true,
    	"language": {
            "decimal": ".",
            "thousands": ",",
            "info": "보이는페이지 _PAGE_ / _PAGES_",
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Korean.json"
        },
        "lengthMenu": [[5,10, 15, 20,50, -1], [5,10, 15,20, 50, "All"]]
    });
} );
</script>
</head>

<body>
	<table width="100%">
	<tr height="20">
			<td align="center" width="14%" bgcolor="black"><a href="<%=memberroot%>memberJoin.php"
				style="text-decoration: none"><font color="white" size="4">회원등록</font></a>
			</td>
			<td align="center" width="14%" bgcolor="gray"><a href="<%=memberroot%>memberInfor.do"
				style="text-decoration: none"><font color="white" size="4">본인정보</font></a>

			</td>
			<td align="center" width="15%" bgcolor="black"><a
				href="Instructions.jsp"
				style="text-decoration: none"><font color="white" size="4">자유게시판</font></a>

			</td>
			<td align="center" width="14%" bgcolor="gray"><a href="<%=homebookroot%>form_homebook.jsp"
				style="text-decoration: none"><font color="white" size="4">사진게시판</font></a>
			</td>
			<td align="center" width="15%" bgcolor="black"><a href="<%=homebookroot%>allBook.do"
				style="text-decoration: none"><font color="white" size="4">모든자료</font></a>
			</td>
			<td align="center" width="14%" bgcolor="gray"><a href="<%=memberroot%>allMember.do"
				style="text-decoration: none"><font color="white" size="4">모든회원</font></a>
			</td>
			<td align="center" width="14%" bgcolor="black"><a href="<%=boardroot%>boardList.jsp"
				style="text-decoration: none"><font color="white" size="4">게시판</font></a>
			</td>
		</tr>
		</table>
<style type="text/css">
	.jumbotron {
		background-image:url('images/1234.jpg');
		background-size : cover;
	    color : block;
	}
</style>

<div class="container">
<div class="jumbotron">
	<div align="left">
	<h1 class="display-10">자유 게시판</h1>
	</div>
	 <?php
    $conn = mysqli_connect("localhost", "root", "", "test");
    if ($conn) {
        echo "연결 성공<br>";
    } else {
        // 에러시 메세지를 뿌려주고 종료 시킴
        die("연결 실패 : " . mysqli_error());
    }
    $sql = "SELECT board_no, board_title, board_user,
                     board_date FROM board order by
                     board_no desc";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    ?>
     <table id="example" class="table table-striped table-bordered"
		style="width: 100%" border="1">
		<thead>
		<th>번호</th>
		<th>제목</th>
		<th>글쓴이</th>
		<th>작성일</th>
		<th>수정</th>
		<th>삭제</th>
		</thead>
		<tbody>
		
            <?php
            // 반복문을 이용하여 result 변수에 담긴 값을 row변수에
            // 계속 담아서 row변수의 값을 테이블에 출력한다.
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
				<td>
				<?=$row["board_no"]?>
                </td>
				<td><a href='./board_detail.php?board_no=" . $row["board_no"] . "'>
                <?=$row["board_title"]?></a>
                </td>
				<td>
                <?=$row["board_user"]?>
                </td>
				<td>
                <?=$row["board_date"]?>
                </td>
				<td><a href='./board_update_form.php?board_no=<?=$row["board_no"]?>'>수정</a></td>
				<td><a href='./board_delete_form.php?board_no=<?=$row["board_no"]?>'>삭제</a></td>
			</tr>
            <?php
            } // 와일루프 종료
            ?>
            </tbody>
      			</table>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-primary" href="./board_add_form.php">글 쓰기</a>
	   <br><br><br><br><br>
	  <table width="100%" bgcolor='black'>
		<tr height="15">
			<td align="center"> 
			<font color="white" size="2">
			대전광역시 중구 선화동 비젼빌딩 | 대표이사  아무개 | 사업자 등록번호  111-11-11111 | 
			상호 : 비젼캐-피탈주식회사 | 전자우편주소 | 이용약관 | 통신판매업신고 |
			COPYRIGHT © VISION CAPITAL SERVICES. INC. ALL RIGHT RESERVED. 
			</font> 
			</td>
		</tr>
	</table>
</body>
</html>