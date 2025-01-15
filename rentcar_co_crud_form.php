<?php
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패"); 
    
    $sql = "select * from company";
    $ret = mysqli_query($con, $sql);
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>회사창고</title>
</head>

<body>
<h1>회사목록</h1>
<table border='1'>

    <tr>
        <td>회사ID</td>
        <td>회사명</td>
        <td>회사번호</td>
        <td>회사주소</td>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($ret)) {
        echo "<tr>";
        echo "<td>" . $row['COMPANY_ID'] . "</td>";
        echo "<td>" . $row['COMPANY_NAME'] . "</td>";
        echo "<td>" . $row['COMPANY_PHONE'] . "</td>";
        echo "<td>" . $row['COMPANY_ADDR'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    ?>
    </table>
    <br>
<a href="index.php" target="main">[메인화면]</a>
&nbsp;<!-- 띄어쓰기-->
<button onclick="location.href='company_register.php'">회사등록</button>
<button onclick="location.href='company_update.php'">회사수정</button>
<button onclick="location.href='company_delete.php'">회사삭제</button>

</body>

</html>

