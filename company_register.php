<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $company_id = $_POST['COMPANY_ID'];
    $company_name = $_POST['COMPANY_NAME'];
    $company_phone = $_POST['COMPANY_PHONE'];
    $company_addr = $_POST['COMPANY_ADDR'];
    $service_hours =$_POST['SERVICE_HOURS'];
    $service_area = $_POST['SERVICE_AREA'];

    $sql = "INSERT INTO company (COMPANY_ID, COMPANY_NAME, COMPANY_PHONE, COMPANY_ADDR, SERVICE_HOURS, SERVICE_AREA) VALUES ('$company_id', '$company_name', '$company_phone', '$company_addr', '$service_hours','$service_area')";

    if (mysqli_query($con, $sql)) {
        echo "회사가 성공적으로 등록되었습니다.";
    } else {
        echo "회사 등록에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>회사등록</title>
</head>

<body>
<h1>회사등록</h1>
<form method="post" action="company_register.php">
    회사ID: <input type="text" name="COMPANY_ID"><br>
    회사명: <input type="text" name="COMPANY_NAME"><br>
    회사번호: <input type="text" name="COMPANY_PHONE"><br>
    회사주소: <input type="text" name="COMPANY_ADDR"><br>
    서비스 시간: <input type="text" name="SERVICE_HOURS"><br> 
    서비스 지역:<input type="text" name="SERVICE_AREA"><br>
    <input type="submit" value="등록">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
