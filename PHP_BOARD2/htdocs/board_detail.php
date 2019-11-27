<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>board_detail.php</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <style>
            table {
                table-layout: fixed;
                word-wrap: break-word;
            }
        </style>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
    </head>

    <body>
        <h1 class="display-4">board_detail.php</h1>
        <?php
            require_once('BoardDaoFunction.php');
            $key = $_GET["board_no"];
            echo $key."번째 글 내용<br>";
            $oneRow = selectOne($key);
        ?>
        <table class="table table-bordered" style="width:50%">
            <?php
                //result 변수에 담긴 값을 row 변수에 저장하여 테이블에 출력
            if($row = mysqli_fetch_array($oneRow)) {
            ?>
            <tr>
                <td style="width:5%">작성자</td>
                <td style="width:40%" colspan="5">
                    <?php
                        echo $row["board_user"];
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width:5%">글 제목</td>
                <td style="width:24%">
                    <?php
                        echo $row["board_title"];
                    ?>
                </td>
                <td style="width:5%">글 번호</td>
                <td style="width:3%">
                        <?php
                            echo $row["board_no"];
                        ?>
                </td>
                <td  style="width:5%">작성 일자</td>
                <td  style="width:3%">
                    <?php
                        echo $row["board_date"];
                    ?>
                </td>
                
            </tr>
            <tr>
                <td colspan="6">
                    <?=$row["board_content"]?>
                </td>
            </tr>
            <?php
             }
             //mysqli_close($conn);
            ?>
        </table>
        <br>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-primary" href="./board_list.php">
        	리스트로 돌아가기</a>
            </body>
</html>