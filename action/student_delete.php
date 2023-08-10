<?php
    $conn = mysqli_connect("nam3324.synology.me","nam2626","q1w2e3","nam2626","32760");
    $student_no = $_POST['student_no'];
    $sql = "delete from STUDENT where STUDENT_NO = '$student_no'";
    $rs = mysqli_query($conn,$sql);
    if($rs){
        echo "1";
    }else{
        echo "0";
    }
?>
