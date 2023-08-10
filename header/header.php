<nav>
    <ul>
        <li><a href="/main.php">홈</a></li>
        <li><a href="/student_main.php">학생관리</a></li>
        <li><a href="/subject_main.php">과목관리</a></li>
        <li><a href="/professor_main.php">교수관리</a></li>
        <li><a href="/sugang_admin.php">수강현황</a></li>
        <li><a href="/action/logout.php">로그아웃</a></li>
    </ul>
</nav>
<style>
    nav{
        width:1200px;
        margin : 0 auto;
        border : 1px solid black;
        margin-bottom : 10px;
    }
    nav > ul {
        display: flex;
        flex-direction : row;
        justify-content:center;
        list-style-type: none;
    }
    nav > ul > li{
        width: 200px;
        text-align:center;
    }
    nav a:link, nav a:visited{
        color:black;
        font-size : 1.2em;
        padding:10px 0px;
        text-decoration : none;
        font-weight : bold;
    }
</style>
<hr>