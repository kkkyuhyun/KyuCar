<?php
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패"); 
    
    $sql = "select * from rentcar";
    
    $ret = mysqli_query($con, $sql);
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>KyuCar 창고</title>
</head>

<body>
<h1>KyuCar's RentCar</h1>
<table border='1'>

    <tr>
        <td>차량ID</td>
        <td>회사ID</td>
        <td>차번호</td>
        <td>모델명</td>
        <td>브랜드</td>
        <td>제작연도</td>
        <td>예약가능여부</td>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($ret)) {
        echo "<tr>";
        echo "<td>" . $row['CAR_ID'] . "</td>";
        echo "<td>" . $row['COMPANY_ID'] . "</td>";
        echo "<td>" . $row['CAR_NUM'] . "</td>";
        echo "<td>" . $row['MODEL'] . "</td>";
        echo "<td>" . $row['BRAND'] . "</td>";
        echo "<td>" . $row['YEAR'] . "</td>";
        echo "<td>" . $row['RENTAL_STATUS']."</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    ?>
    </table>
    <br>
   
<a href="index.php" target="main">[메인화면]</a>
    <button onclick="location.href='rentcar_register.php'">차량등록</button>
    <button onclick="location.href='rentcar_update.php'">차량수정</button>
    <button onclick="location.href='rentcar_delete.php'">차량삭제</button>
&nbsp;<!-- 띄어쓰기-->

</body>

</html>