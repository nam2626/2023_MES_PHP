<meta charset="utf-8">
<?php
    $conn = mysqli_connect("nam3324.synology.me","nam2626","q1w2e3","nam2626","32760");
    $id = $_POST['id'];
    $passwd = $_POST['passwd'];
    $sql = "select * from admin_employee where id like '$id' and passwd like sha2('$passwd',256)";
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($rs);
    if($row){
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        echo "<script>alert('로그인 성공');location.href='/main.php';</script>";
    }else{
        echo "<script>alert('로그인 실패');history.back();</script>";
    }
?>