<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $car_id = $_POST['CAR_ID'];
    $company_id = $_POST['COMPANY_ID'];
    $car_num = $_POST['CAR_NUM'];
    $model = $_POST['MODEL'];
    $brand = $_POST['BRAND'];
    $year = $_POST['YEAR'];
    $rental_status = $_POST['RENTAL_STATUS'];

    $sql = "UPDATE rentcar SET COMPANY_ID='$company_id', CAR_NUM='$car_num', MODEL='$model', BRAND='$brand', YEAR='$year', RENTAL_STATUS='$rental_status' WHERE CAR_ID='$car_id'";

    if (mysqli_query($con, $sql)) {
        echo "차량 정보가 성공적으로 수정되었습니다.";
    } else {
        echo "차량 정보 수정에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>차량수정</title>
</head>

<body>
<h1>차량수정</h1>
<form method="post" action="rentcar_update.php">
    차량ID: <input type="text" name="CAR_ID"><br>
    회사ID: <input type="text" name="COMPANY_ID"><br>
    차번호: <input type="text" name="CAR_NUM"><br>
    모델명: <input type="text" name="MODEL"><br>
    브랜드: <input type="text" name="BRAND"><br>
    제작연도: <input type="text" name="YEAR"><br>
    예약가능여부: <input type="text" name="RENTAL_STATUS"><br>
    <input type="submit" value="수정">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
