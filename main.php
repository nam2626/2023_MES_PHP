<html>
<head>
	<title>Hello goorm</title>
    <style>
        table{
            margin : 0 auto;
            border : 1px solid black;
            margin-bottom : 10px;
            border-collapse: collapse;
        }
        th,td{
            width: 200px;
            text-align:center;
            border : 1px solid black;
            padding : 10px 0px;
        }
    </style>
</head>
<body>
	<?php
        include $_SERVER['DOCUMENT_ROOT']."/header/header.php";
    ?>
    <table>
        <thead>
            <tr>
                <th>학번</th>
                <th>이름</th>
                <th>학과</th>
                <th>평점</th>
            </tr>
        </thead>
        <?php
        //extension_loaded('mysqli');
        $conn = mysqli_connect("nam3324.synology.me","nam2626","q1w2e3","nam2626","32760");
        //접속 결과 확인
        // if(!$conn){
            //     echo "연결 실패";
            // }else{
                //     echo "연결 성공";
                // }
                //mysqli_select_db($conn,"nam2626");
                $sql = "select * from STUDENT_VIEW";
                $rs = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($rs)){
                ?>
                <tr>
                    <td><?php echo $row["STUDENT_NO"]?></td>
                    <td><?php echo $row["STUDENT_NAME"]?></td>
                    <td><?php echo $row["MAJOR_NAME"]?></td>
                    <td><?php echo $row["STUDENT_SCORE"]?></td>
                </tr>
            <?php
        }
    ?>
    </table>
</body>
</html>