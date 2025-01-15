<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $company_id = $_POST['COMPANY_ID'];

    $sql = "DELETE FROM company WHERE COMPANY_ID='$company_id'";

    if (mysqli_query($con, $sql)) {
        echo "회사가 성공적으로 삭제되었습니다.";
    } else {
        echo "회사 삭제에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>회사삭제</title>
</head>

<body>
<h1>회사삭제</h1>
<form method="post" action="company_delete.php">
    회사ID: <input type="text" name="COMPANY_ID"><br>
    <input type="submit" value="삭제">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
