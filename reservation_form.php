<?php
$servername = "127.0.0.1";
$username = "projectuser";
$password = "project1234";
$dbname = "db32190344";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

if (isset($_POST['user_id']) && isset($_POST['car_id']) && isset($_POST['company_id']) && isset($_POST['reservation_start']) && isset($_POST['reservation_end'])) {
    $user_id = $_POST['user_id'];
    $car_id = $_POST['car_id'];
    $company_id = $_POST['company_id'];
    $reservation_start = $_POST['reservation_start'];
    $reservation_end = $_POST['reservation_end'];

    // 예약 일수 계산
    $total_days = (strtotime($reservation_end) - strtotime($reservation_start)) / (60 * 60 * 24);

    // SQL 쿼리 작성
    $sql = "INSERT INTO ORDERS (USER_ID, CAR_ID, COMPANY_ID, RESERVATION_START, RESERVATION_END, TOTAL_DAYS, RESERVATION_STATUS)
    VALUES ('$USER_ID', '$CAR_ID', '$COMPANY_ID', '$RESERVATION_START', '$RESERVATION_END', '$TOTAL_DAYS', '예약됨')";

    // 쿼리 실행 및 결과 확인
    if ($conn->query($sql) === TRUE) {
        echo "예약이 성공적으로 완료되었습니다.";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo null;
}

// 데이터베이스 연결 종료
$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>예약 폼</title>
    <style>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        label {
            width: 40%;
        }
        input {
            width: 55%;
            padding: 5px;
        }
        button {
            display: block;
            width: auto;
            padding: 10px 20px;
            margin: 0 auto;
        }
    </style>
    <script>
        function showAlert() {
            alert("예약이 성공적으로 완료되었습니다.");
            window.location.href = "index.php";
        }
    </script>
</head>
<body>
    <div class="container">
        <form action="reservation_form.php" method="post" onsubmit="showAlert(); return false;">
            <div class="form-group">
                <label for="USER_ID"><b>아이디</b></label>
                <input type="text" id="USER_ID" name="USER_ID" required>
            </div>

            <div class="form-group">
                <label for="CAR_ID"><b>예약 차량</b></label>
                <input type="text" id="CAR_ID" name="CAR_ID" required>
            </div>

            <div class="form-group">
                <label for="company_name"><b>렌트 회사</b></label>
                <input type="text" id="company_name" name="company_name" required>
            </div>

            <div class="form-group">
                <label for="reservation_start"><b>예약 시작일</b></label>
                <input type="date" id="reservation_start" name="reservation_start" required>
            </div>

            <div class="form-group">
                <label for="reservation_end"><b>예약 종료일</b></label>
                <input type="date" id="reservation_end" name="reservation_end" required>
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
