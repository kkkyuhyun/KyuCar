<?php
$servername = "127.0.0.1";
$username = "projectuser";
$password = "project1234";
$dbname = "db32190344";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}
if (isset($_POST['payment_method']) && isset($_POST['confirmation'])) {
    $payment_method = $_POST['payment_method'];
    $confirmation = $_POST['confirmation'];


    $payment_status = ($confirmation === '예') ? '결제 완료' : '결제 취소';

    $sql = "UPDATE ORDERS SET PAYMENT_METHOD='$payment_method', PAYMENT_STATUS='$payment_status' WHERE ORDER_ID='주문 ID'";

    if ($conn->query($sql) === TRUE) {
        if ($confirmation === '예') {
            echo "<script>
                    alert('결제가 성공적으로 완료되었습니다.');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>alert('결제를 실패하였습니다.');</script>";
        }
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>결제 폼</title>
    <style> /*스타일 css 속성 같은 것들은 화면에 디자인을 입혀주고 싶어서 제가 (GPT와 기타 자료들 등을) 찾아보고 추가로 코드를 입력하였습니다. */
        .container {
            width: 20%;
            margin: 0 auto;
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block; /* 라벨을 블록 요소로 설정 */
            margin-bottom: 5px;
        }
        .radio-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .radio-group label {
            margin-left: 5px; /* 라벨과 라디오 버튼 사이의 간격을 줄임 */
        }
        input, select {
            width: 100%; /* 입력 요소의 너비를 100%로 설정 */
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            display: block;
            width: auto;
            padding: 10px 20px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="payment_form.php" method="post">
            <div class="form-group">
                <div><h1><br> KyuCar Pay</h1></div> <br>
                <label><b>결제를 진행하시겠습니까?</b></label>
                <div class="radio-group">
                    <input type="radio" id="yes" name="confirmation" value="예" required>
                    <label for="yes">YES</label>
                    <input type="radio" id="no" name="confirmation" value="아니오" required>
                    <label for="no">NO</label>
                </div>
            </div>

            <div class="form-group">
                <label for="payment_method"><b>결제 방식을 선택해주세요</b></label>
                <select id="payment_method" name="payment_method" required>
                    <option value="신용카드">신용카드</option>
                    <option value="계좌이체">계좌이체</option>
                    <option value="휴대폰">휴대폰</option>
                    <option value="체크카드">체크카드</option>
                </select>
            </div>

            <button type="submit">확인</button>
        </form>

        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </div>
</body>
</html>
