<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $order_id = $_POST['ORDER_ID'];
    $user_id = $_POST['USER_ID'];
    $car_id = $_POST['CAR_ID'];
    $company_id = $_POST['COMPANY_ID'];
    $reservation_start = $_POST['RESERVATION_START'];
    $reservation_end = $_POST['RESERVATION_END'];
    $total_days = $_POST['TOTAL_DAYS'];
    $reservation_status = $_POST['RESERVATION_STATUS'];
    $payment_method = $_POST['payment_method'];
    $payment = $_POST['payment'];
    $payment_status = $_POST['payment_status'];

    $sql = "UPDATE orders SET USER_ID='$user_id', CAR_ID='$car_id', COMPANY_ID='$company_id', RESERVATION_START='$reservation_start', RESERVATION_END='$reservation_end', TOTAL_DAYS='$total_days', RESERVATION_STATUS='$reservation_status', payment_method='$payment_method', payment='$payment', payment_status='$payment_status' WHERE ORDER_ID='$order_id'";

    if (mysqli_query($con, $sql)) {
        echo "거래 정보가 성공적으로 수정되었습니다.";
    } else {
        echo "거래 정보 수정에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>거래수정</title>
</head>

<body>
<h1>거래수정</h1>

<p1><u><b>( ※거래ID, 고객ID, 차량ID, 회사ID는 수정이 불가능합니다.) </b></u></p1>
<form method="post" action="transaction_update.php">
    거래ID: <input type="text" name="ORDER_ID"><br>
    고객ID: <input type="text" name="USER_ID"><br>
    차량ID: <input type="text" name="CAR_ID"><br>
    회사ID: <input type="text" name="COMPANY_ID"><br>
    예약시작일: <input type="text" name="RESERVATION_START"><br>
    예약종료일: <input type="text" name="RESERVATION_END"><br>
    총예약일: <input type="text" name="TOTAL_DAYS"><br>
    예약여부: <input type="text" name="RESERVATION_STATUS"><br>
    결제방식: <input type="text" name="payment_method"><br>
    결제금액: <input type="text" name="payment"><br>
    결제여부: <input type="text" name="payment_status"><br>
    <input type="submit" value="수정">
</form>
<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
