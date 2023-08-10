<?php
    $conn = mysqli_connect("nam3324.synology.me","nam2626","q1w2e3","nam2626","32760");
    $student_no = $_POST['student_no'];
    $student_name = $_POST['student_name'];
    $major_name = $_POST['major_name'];
    $student_score = $_POST['student_score'];

    $sql = "update STUDENT set STUDENT_NAME = '$student_name', MAJOR_NO = (select MAJOR_NO FROM MAJOR WHERE MAJOR_NAME = '$major_name'), STUDENT_SCORE = '$student_score' where STUDENT_NO = '$student_no'";

   
    $rs = mysqli_query($conn,$sql);
    if($rs){
        echo "1";
    }else{
        echo "0";
    }
?>