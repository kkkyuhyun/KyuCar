<?php
$host = '127.0.0.1';
$dbname = 'db32190344';
$username = 'projectuser';
$password = 'project1234';

try { //예외처리는 찾아보고 입력했습니다. 중간중간 계속 화면에 에러가 떠서.. 잘 모르겠어서 try catch문을 활용하여(GPT와 인터넷에서 자료조사하여) 사용했습니다. 죄송합니다.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];

      //이 부분도 db연동이 원할하게 되지 않아서 찾아보고 입력한 코드입니다. 
        $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();

        if ($user && password_verify($user_pw, $user['user_pw'])) {
           
            echo "로그인 성공! <a href='index.php'>홈으로 가기</a>";
        } else {
            
            echo "아이디 또는 비밀번호가 잘못되었습니다.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

