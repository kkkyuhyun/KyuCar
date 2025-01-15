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

    $sql = "INSERT INTO rentcar (CAR_ID, COMPANY_ID, CAR_NUM, MODEL, BRAND, YEAR, RENTAL_STATUS) VALUES ('$car_id', '$company_id',  '$car_num', '$model', '$brand', '$year', '$rental_status')";

    if (mysqli_query($con, $sql)) {
        echo "차량이 성공적으로 등록되었습니다.";
    } else {
        echo "차량 등록에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>차량등록</title>
</head>

<body>
<h1>차량등록</h1>
<form method="post" action="rentcar_register.php">
    차량ID(차량ID를 정확히 확인하세요.): <input type="text" name="CAR_ID"><br>
    회사ID(메인 회사창고에서 확인하세요.): <input type="text" name="COMPANY_ID"><br>
    차번호: <input type="text" name="CAR_NUM"><br>
    모델명: <input type="text" name="MODEL"><br>
    브랜드: <input type="text" name="BRAND"><br>
    제작연도: <input type="text" name="YEAR"><br>
    예약가능여부: <input type="text" name="RENTAL_STATUS"><br>
    <input type="submit" value="등록">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
