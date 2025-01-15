<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $car_id = $_POST['CAR_ID'];

    $sql = "DELETE FROM rentcar WHERE CAR_ID='$car_id'";

    if (mysqli_query($con, $sql)) {
        echo "차량이 성공적으로 삭제되었습니다.";
    } else {
        echo "차량 삭제에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>차량삭제</title>
</head>

<body>
<h1>차량삭제</h1>
<form method="post" action="rentcar_delete.php">
    차량ID: <input type="text" name="CAR_ID"><br>
    <input type="submit" value="삭제">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
