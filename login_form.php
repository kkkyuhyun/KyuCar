<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>로그인</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="login_form">
    <div class="form-container">
        <h2>로그인</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="user_id">아이디</label>
                <input type="text" id="user_id" name="user_id" required />
            </div>
            <div class="form-group">
                <label for="user_pw">비밀번호</label>
                <input type="password" id="user_pw" name="user_pw" required />
            </div>
            <button type="submit">로그인</button>
        </form>
        <p>아직 계정이 없으신가요? <a href="register_form.php">회원가입</a></p>
    </div>
</body>
</html>
