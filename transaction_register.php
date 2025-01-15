<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "projectuser", "project1234", "db32190344") or die("MySQL 접속실패");

    $order_id = $_POST['ORDER_ID'];
    $user_id = $_POST['USER_ID'];
    $car_id = $_POST['CAR_ID']; 
    $company_id = $_POST['COMPANY_ID'];
    $reservation_start= $_POST['RESERVATION_START'];
    $reservation_end = $_POST['RESERVATION_END'];
    $total_days = $_POST['TOTAL_DAYS'];
    $reservation_status = $_POST['RESERVATION_STATUS'];
    $payment_method = $_POST['payment_method'];
    $payment = $_POST['payment'];
    $payment_status = $_POST['payment_status'];

    $sql = "INSERT INTO orders (ORDER_ID, USER_ID, CAR_ID, COMPANY_ID,RESERVATION_START, RESERVATION_END, TOTAL_DAYS, RESERVATION_STATUS, payment_method, payment, payment_status) VALUES ('$order_id', '$user_id', '$car_id', '$company_id', '$reservation_start', '$reservation_end', '$total_days', '$reservation_status','$payment_method', '$payment', '$payment_status')";

    if (mysqli_query($con, $sql)) {
        echo "거래가 성공적으로 등록되었습니다.";
    } else {
        echo "거래 등록에 실패했습니다: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>


<html>

<head>
    <META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>거래내역추가</title>
</head>

<body>
<h1>거래내역추가</h1>
<form method="post" action="">
    거래ID(☆중복 불가! 거래내역에서 확인하세요.): &nbsp; &nbsp; &nbsp;<input type="text" name="ORDER_ID"><br>
    고객ID(☆고객님의 ID를 입력하세요.          ): &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<input type="text" name="USER_ID"><br>
    차량ID(☆메인화면 KyuCar창고에서 확인하세요.): &nbsp; &nbsp;<input type="text" name="CAR_ID"><br>
    회사ID(☆메인화면 회사창고에서  확인하세요. ): &nbsp; &nbsp; &nbsp;<input type="text" name="COMPANY_ID"><br>
    예약시작일(☆YYYY-MM-DD형식으로 입력하세요. ): <input type="text" name="RESERVATION_START"><br>
    예약종료일(☆YYYY-MM-DD형식으로 입력하세요. ): <input type="text" name="RESERVATION_END"><br>
    총예약일: <input type="text" name="TOTAL_DAYS"><br>
    예약여부: <input type="text" name="RESERVATION_STATUS"><br>
    결제방식: <input type="text" name="payment_method"><br>
    결제금액: <input type="text" name="payment"><br>
    결제여부: <input type="text" name="payment_status"><br>
    <input type="submit" value="등록">
</form>

<br>
<a href="index.php" target="main">[메인화면🏚]</a>
&nbsp;<!-- 띄어쓰기-->
</body>

</html>
