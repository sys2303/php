<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       	<link rel="stylesheet" href="./css/bootstrap.css">
       	<script type="text/javascript" src="./js/bootstrap.js"></script>
    </head>
    <body>
    
    	<h1 class="display-8">게시글을 삭제 하시겠습니까?</h1>
		<?php
        $board_no = $_GET["board_no"];
        echo $board_no."번째 글 삭제 페이지<br>";
        ?>
		<form action="./board_delete_action.php" method="post">
		<table class="table table-bordered" style="width:10%">
			<tr>
				<td>글 비밀번호를 입력하세요.</td>
			</tr>
			<tr>
				<td><input type="text" name="board_pw">
					<input type="hidden" name="board_no" value="<?php echo $board_no ?>">
				</td>
			</tr>
			<tr>
				<td><button class="btn btn=primary" type="submit">글 삭제 버튼</button>	</td>
			</tr>
		</table>
		</form>
		
    </body>
</html>