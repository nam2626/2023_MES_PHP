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
        input{
            width:99%;
            box-sizing: border-box;
            height:30px;
            text-align:center;
        }
        button{
            width:100%;
            height:30px;
        }
    </style>
    <!-- jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        function delete() {
            //학번 선택
            var student_no = $(this).parent().parent().find('input[name=student_no]').val();
                //ajax
                $.ajax({
                    url : "/action/student_delete.php",
                    type : "post",
                    data : 'student_no='+student_no,
                    success : function(data){
                        console.log(data);
                        if(data == 1){
                            alert("삭제 성공");
                            location.reload();
                        }else{
                            alert("삭제 실패");
                        }
                    }
                });
        }
        function update(){
            //학번 선택
            var student_no = $(this).parent().parent().find('input[name=student_no]').val();
                var student_name = $(this).parent().parent().find('input[name=student_name]').val();
                var major_name = $(this).parent().parent().find('input[name=major_name]').val();
                var student_score = $(this).parent().parent().find('input[name=student_score]').val();
                //ajax
                $.ajax({
                    url : "/action/student_update.php",
                    type : "post",
                    data : 'student_no='+student_no+'&student_name='+student_name+'&major_name='+major_name+'&student_score='+student_score,
                    success : function(data){
                        console.log(data);
                        if(data == 1){
                            alert("수정 성공");
                            location.reload();
                        }else{
                            alert("수정 실패");
                        }
                    }
                });

        }
        $(function(){
            $(".btn_delete").click(delete);
            $('.btn_update').click(update);
            $("#btn_search").click(function(){
                //검색어
                var kind = $("#kind").val();
                var search = $("#search").val();
                //ajax
                $.ajax({
                    url : "/action/student_search.php",
                    type : "post",
                    data : 'kind='+kind+'&search='+search,
                    dataType : "json",
                    success : function(data){
                        console.log(data);
                        var html = "";
                        for(var i = 0; i < data.length; i++){
                            html += "<tr>";
                            html += "<td><input type='text' name='student_no' value='"+data[i].student_no+"'></td>";
                            html += "<td><input type='text' name='student_name' value='"+data[i].student_name+"'></td>";
                            html += "<td><input type='text' name='major_name' value='"+data[i].major_name+"'></td>";
                            html += "<td><input type='text' name='student_score' value='"+data[i].student_score+"'></td>";
                            html += "<td><button class='btn_update'>수정</button></td>";
                            html += "<td><button class='btn_delete'>삭제</button></td>";
                            html += "</tr>";
                        }
                        $(".data_list").html(html);
                        $(".btn_delete").click(delete);
                        $('.btn_update').click(update);


                        
                    }
                });
            }
        });

    </script>
</head>
<body>
	<?php
        include $_SERVER['DOCUMENT_ROOT']."/header/header.php";
    ?>
    <table>
        <thead>
            <tr>
                <th colspan="6">
                    <select id="kind" name="kind">
                        <option value="student_no">학번</option>
                        <option value="student_name">이름</option>
                        <option value="major_name">학과</option>
                    </select>
                    <input type="text" id="search" name="search">
                    <button id="btn_search">검색</button>
                </th>
            </tr>
            <tr>
                <th>학번</th>
                <th>이름</th>
                <th>학과</th>
                <th>평점</th>
                <th colspan="2">비고</th>
            </tr>
        </thead>
        <tbody class="data_list">
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
                    <td><input type="text" name="student_no" value="<?=$row["STUDENT_NO"]?>" readonly></td>
                    <td><input type="text" name="student_name" value="<?=$row["STUDENT_NAME"]?>"></td>
                    <td><input type="text" name="major_name" value="<?=$row["MAJOR_NAME"]?>"></td>
                    <td><input type="text" name="student_score" value="<?=$row["STUDENT_SCORE"]?>"></td>
                    <td><button class="btn_update">수정</button></td>
                    <td><button class="btn_delete">삭제</button></td>
                </tr>
                <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>