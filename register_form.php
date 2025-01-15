<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>회원가입</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="register_form">
    <div class="form-container">
        <h2>회원가입</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="user_id">아이디</label>
                <input type="text" id="user_id" name="user_id" required />
            </div>
            <div class="form-group">
                <label for="user_pw">비밀번호</label>
                <input type="password" id="user_pw" name="user_pw" required />
            </div>
            <div class="form-group">
                <label for="name">이름</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">이메일</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="phone">전화번호</label>
                <input type="text" id="phone" name="phone" placeholder="예)01012345678" required>
                <!-- 안내문구 --> 
                 <small> ※하이픈(-)을 입력하지 않고 작성해주세요</small>
            </div>
            <div class="form-group">
                <label for="birth">생년월일</label>
                <input type="date" id="birth" name="birth" />
            </div>
            <button type="submit">회원가입</button>
        </form>
        <p>이미 계정이 있으신가요? <a href="login_form.php">로그인</a></p>
    </div>
</body>
</html>
