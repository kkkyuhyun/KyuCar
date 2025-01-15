<?php
$host = '127.0.0.1'; 
$dbname = 'db32190344'; 
$username = 'projectuser'; 
$password = 'project1234'; 

try { //예외처리는 찾아보고 입력했습니다. 중간중간 계속 화면에 에러가 떠서.. 잘 모르겠어서 try catch문을 활용하여(GPT와 인터넷에서 자료조사하여) 사용했습니다. 죄송합니다.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "데이터베이스 연결 실패: " . $e->getMessage();
}
?>
