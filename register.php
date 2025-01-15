<?php
$host = '127.0.0.1';
$dbname = 'db32190344';
$username = 'projectuser';
$password = 'project1234';

try {//예외처리는 찾아보고 입력했습니다. 중간중간 계속 화면에 에러가 떠서.. 잘 모르겠어서 try catch문을 활용하여(GPT와 인터넷에서 자료조사하여) 사용했습니다. 죄송합니다.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];  
        $birth= $_POST['birth'];

        // 비밀번호 해싱 처리 : 이부분 또한 회원가입 시 비밀번호 설정 요소인데 해싱 처리가 필요하다고 하여 GPT와 인터넷 자료조사를 통해 코드를 작성하여 활용하여 적었습니다. 
        $hashed_pw = password_hash($user_pw, PASSWORD_DEFAULT);

        // SQL 쿼리 실행 : 이 부분도 그렇습니다. 
        $stmt = $pdo->prepare("INSERT INTO user (user_id, user_pw, name, email, phone, birth, create_date) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$user_id, $hashed_pw, $name, $email, $phone, $birth]);

        echo "회원가입이 완료되었습니다. <a href='index.php'>돌아가기</a>";
    }
} catch (PDOException $e) { //예외처리는 찾아보고 입력했습니다. 계속 에러가 떠서 어쩔 수 없었습니다.. 죄송합니다.
    echo "Error: " . $e->getMessage();
    die("Database connection failed. Check your host, username, password, and database name.");
}
?>
