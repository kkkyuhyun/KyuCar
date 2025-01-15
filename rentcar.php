<?php
// 차량 데이터 정의
$cars = [
    ["img" => "img/chevrolet_malibu.jpg", "name" => "MALIBU"],
    ["img" => "img/hyundai_grandeur.jpg", "name" => "GRANDEUR"],
    ["img" => "img/venue.jpg", "name" => "VENUE"],
    ["img" => "img/carnival.jpg", "name" => "CARNIVAL"],
    ["img" => "img/sonata.PNG", "name" => "SONATA"],
    ["img" => "img/K5.PNG", "name" => "K5"],
    ["img" => "img/SANTA_FE.PNG", "name" => "SANTA_FE"],
    ["img" => "img/SORENTO.PNG", "name" => "SORENTO"],
    ["img" => "img/캐스퍼.PNG","name"=> "CASPER"],
    ["img" => "img/IONIQ5.PNG", "name"=>"IONIQ5"]
];

// 페이지네이션 설정
$items_per_page = 5; // 한 페이지에 표시할 차량 수
$total_items = count($cars); // 총 차량 수
$total_pages = ceil($total_items / $items_per_page); // 총 페이지 수

// 현재 페이지 확인 (URL의 'page' 파라미터를 통해 확인)
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max(1, min($current_page, $total_pages)); // 범위 제한

// 표시할 차량의 시작 인덱스와 끝 인덱스 계산
$start_index = ($current_page - 1) * $items_per_page;
$end_index = min($start_index + $items_per_page, $total_items);

// 현재 페이지의 차량 데이터 추출
$current_cars = array_slice($cars, $start_index, $items_per_page);
?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>렌터카 서비스</title>
    <style>
    
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
      }
      header {
        background-color: #0078d7;
        color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      header .logo {
        font-size: 1.5rem;
        font-weight: bold;
      }
      header .menu {
        cursor: pointer;
      }
      .container {
        padding: 20px;
      }
      .ad-banner {
        background-color: #ffe7ba;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 20px;
      }
      .ad-banner button {
        background-color: #ff5722;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
      }
      .search-bar {
        text-align: right; /* 검색 입력란을 오른쪽 정렬 */
        margin-top: 20px;
      }
    
      .search-section {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
      }
      .search-section h2 {
        margin-bottom: 10px;
      }
      .search-section .filter {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
      }
      .search-section .filter button {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        cursor: pointer;
        border-radius: 5px;
      }
      .search-section .cars {
        display: flex;
        grid-template-columns: repeat(4, 1fr); /*4개의 칸으로 나누어 배치*/
        gap: 15px;
      }
      .search-section .car {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        display: flex;
        flex-direction: column; 
        align-items: center;
        justify-content: space-between;
        height:200px;
        width: 250px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      }

      .search-section .car img {
        max-width:100%;
        max-height: 80%;
        border-radius: 10px;
        object-fit:contain;
        transition: transform 0.3s ease; /*부드러운 효과*/
      }
      .search-section .car img:hover{
        transform: scale(1.2); /*이미지 확대*/
      }
      .search-section .car b{
        margin-top: 1px;
        font-size: 1rem;
        font-weight:bold;
        word-break: break-word;
      }

      .reviews-section {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
      }
      .reviews-section .review {
        padding: 10px;
        border-bottom: 1px solid #ccc;
      }
      footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: 20px;
      }
      footer button {
        background-color: #0078d7;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
      }
      .pagination {
        text-align: center;
        margin-top: 20px;
        display:flex;
        justify-content:center;
        gap:5px;
      }
     /* .pagination button {
        margin: 0 5px;
        padding: 8px 16px;
        border: 1px solid #ddd;
        background-color: #fff;
        cursor: pointer;
      }
      .pagination button.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
      }*/
      .pagination a { 
    display: inline-block; 
    padding: 8px 16px; 
    border: 1px solid #ddd; 
    background-color: #fff; 
    text-decoration: none; 
    color: #007bff; 
    border-radius: 5px; 
    font-weight: bold;
}
.pagination a.active { 
    background-color: #007bff; 
    color: white; 
    border-color: #007bff; 
}
.pagination a:hover { 
    background-color: #0056b3; 
    color: white; 
    border-color: #0056b3; 
}
    </style>
  </head>
  <body>
    <header>
      <div class="logo">KyuCar</div>
      <div class="menu">
        <a href="index.php">🏠Home</a>
      </div>
    </header>

    <div class="container">
      <!-- 광고 배너 -->
      <div class="ad-banner">
        <h1>WELCOME 2025! 신년맞이 특별할인 행사🎉</h1>
        <p>지금 바로 신청하세요!</p>
        <button>자세히 보기</button>
      </div>
      <!--
      <section class="search-section">
  <h2>차량 확인하기</h2>
  <div class="search-bar">
    <input type="text" id="search-input" placeholder="차량 이름을 검색하세요..." />
  </div>
  <div class="cars">
    <div class="car">
      <img src="img/chevrolet_malibu.jpg" alt="말리부" width="550" height="336" />
     <b>MALIBU</b>
    </div>
    <div class="car">
      <img src="img/hyundai_grandeur.jpg" alt="그랜저" width="720" height="500" />
      <b>GRANDEUR</b>
    </div>
    <div class="car">
      <img src="img/venue.jpg" alt="베뉴" width="960" height="604" />
      <b>VENUE</b>
    </div>
    <div class="car">
      <img src="img/carnival.jpg" alt="카니발" width="1024" height="683" />
     <b>CARNIVAL</b>
    </div>
  </div>
  <div class="pagination">
    <button class="active" onclick="changePage(1)">1</button>
    <button onclick="changePage(2)">2</button>
    <button onclick="changePage(3)">3</button>
    <button onclick="changePage(4)">4</button>
  </div>
</section>

    -->
    <div class="container">
    <section class="search-section">
        <h2>차량 확인하기</h2>
        <div class="search-bar">
           <input type="text" id="search-input" placeholder="차량 이름을 검색하세요..." />
  </div>
        <div class="cars">
            <?php foreach ($current_cars as $car): ?>
                <div class="car">
                    <img src="<?= htmlspecialchars($car['img']) ?>" alt="<?= htmlspecialchars($car['name']) ?>">
                    <b><?= htmlspecialchars($car['name']) ?></b>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- 페이지네이션 -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= $i === $current_page ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    </section>
</div>


      <!-- 고객 후기 -->
      <section class="reviews-section">
        <h2>고객 후기</h2>
        <div class="review">
          ⭐⭐⭐⭐⭐<b> 말리부 이용 후기 </b>: 정말 만족스러웠습니다!
        </div>
        <div class="review">⭐⭐⭐ <b>그랜저 이용 후기 </b>: 가성비 좋습니다.</div>
        <div class="review">⭐⭐⭐⭐ <b>캐스퍼 이용 후기 </b>: 디자인이 너무 이쁘고 맘에 듭니다.</div>
      </section>
    </div>

    <footer>
      <p>매니저와 상담을 원한다면?</p>
      <button>상담 신청</button>
    </footer>
  </body>
</html>
