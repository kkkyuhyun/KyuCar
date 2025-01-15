<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $order_id = $_POST['ORDER_ID'];

    $sql = "DELETE FROM orders WHERE ORDER_ID='$order_id'";

    if (mysqli_query($con, $sql)) {
        echo "거래가 성공적으로 삭제되었습니다.";
    } else {
        echo "거래 삭제에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>거래삭제</title>
</head>

<body>
<h1>거래삭제</h1>
<form method="post" action="transaction_delete.php">
    거래ID: <input type="text" name="ORDER_ID"><br>
    <input type="submit" value="삭제">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
