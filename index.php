<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KyuCar Main</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- 상단 네비게이션 -->
    <header>
      <nav>
        <ul>
          <li><a href="rentcar.php">렌터카 목록</a></li>
          <li><a href="rentcar_company.php">회사 정보</a></li>
          <li><a href="transaction_form.php">거래 내역</a></li>
          <li><a href="login_form.php">로그인</a></li>
          <li><a href="register_form.php">회원가입</a></li>
        </ul>
      </nav>
    </header>

    <!-- 메인 배너 -->
    <main>
      <section class="banner">
        <div class="logo">KyuCar</div>
        <img src="img/banner4.PNG" alt="차량배너" width="500">
        <br />
        <div class="custom-message">
          고객 맞춤형 차량 대여 서비스, KyuCar입니다!🚘
        </div>
      </section>
    </main>

    <!-- 주요 기능 항목 구간 -->
    <section class="features">
      <div class="feature-item">
      <img src="img/캐스퍼.PNG" alt="캐스퍼" width="175">  
        <br />
       <div>
        <button onclick="location.href='rentcar_crud_form.php'">KyuCar 창고</button>
       </div>
      </div>
      <div class="feature-item">
        <div class="company-logos">
          <img src="img/socar.PNG" alt="SOCAR" />&nbsp; &nbsp; &nbsp;
          <img src="img/롯데렌터카.PNG" alt="롯데렌터카" />
          <br />
          <img src="img/현대.PNG" alt="현대" /> &nbsp; &nbsp; &nbsp;
          <img src="img/기아.PNG" alt="기아" />
        </div>
        <div>
        <button onclick="location.href='rentcar_co_crud_form.php'">회사 창고</button>
        </div>
      </div>
      <div class="feature-item">
        <span class="clock-icon">🕓</span>
        <br />
        <div class="find-btn">
          <form action="reservation_form.php" method="post">
        <button type="submit" class="btn btn-navy navbar-btn find-btn1" >예약하기</button></form>
        <form action="payment_form.php" method="post">
        <button type="submit" class="btn btn-grey navbar-btn find-btn1" >결제하기</button></form>
        </div>
      </div>
    </section>
  </body>
</html>
