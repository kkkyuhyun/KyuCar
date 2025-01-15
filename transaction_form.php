<?php
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패"); 
    
    $sql = "select * from orders";
    $ret = mysqli_query($con, $sql);
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>거래내역</title>
</head>

<body>
<h1>거래내역</h1>
<table border='1'>

    <tr>
        <td>거래번호</td>
        <td>유저ID</td>
        <td>차ID</td>
        <td>회사ID</td>
        <td>예약일</td>
        <td>예약종료일</td>
        <td>총일수</td>
        <td>예약상태</td>
        <td>결제방법</td>
        <td>결제금액</td>
        <td>결제상태</td>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($ret)) {
        echo "<tr>";
        echo "<td>" . $row['ORDER_ID'] . "</td>";
        echo "<td>" . $row['USER_ID'] . "</td>";
        echo "<td>" . $row['CAR_ID'] . "</td>";
        echo "<td>" . $row['COMPANY_ID'] . "</td>";
        echo "<td>" . $row['RESERVATION_START'] . "</td>";
        echo "<td>" . $row['RESERVATION_END'] . "</td>";
        echo "<td>" . $row['TOTAL_DAYS'] . "</td>";
        echo "<td>" . $row['RESERVATION_STATUS'] . "</td>";
        echo "<td>" . $row['payment_method'] . "</td>";
        echo "<td>" . $row['payment'] . "</td>";
        echo "<td>" . $row['payment_status'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    ?>
    </table>
    <br>
<a href="index.php" target="main">[메인화면🏚]</a>
<button onclick="location.href='transaction_register.php'">거래내역추가</button>
<button onclick="location.href='transaction_update.php'">거래내역수정</button>
<button onclick="location.href='transaction_delete.php'">거래내역삭제</button>
&nbsp;<!-- 띄어쓰기-->

</body>

</html>
