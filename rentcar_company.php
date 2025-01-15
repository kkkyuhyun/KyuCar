<?php // 저는 기초설계서에서 작성한대로 페이지 네이션 기능들과 렌터카 회사 데이터 입력 기능을 넣고 싶었어서 추가 기능들을 다음과 같이 활용하여 코드에 입력하였습니다. 
// 렌터카 회사 데이터 불러오는 방식 
$companies = [
    ["name" => "SOCAR", "number" => "1661-3315", "address" => "서울시 송파구 방이로 83-21, 다대빌 4층", "hours" => "24시간 연중무휴", "logo" => "img/socar.PNG", "link" => "https://www.socar.kr/"],
    ["name" => "롯데렌터카", "number" => "1588-1230", "address" => "서울시 강남구 테헤란로 422, K타워 6-9F", "hours" => "오전 6시 - 오후 11시", "logo" => "img/롯데렌터카.PNG", "link" => "https://www.lotterentacar.net"],
    ["name" => "SK렌터카", "number" => "1599-9111", "address" => "서울특별시 중구 순화동 번지 14동 -15층 1-170 케이지타워", "hours" => "오전 8시 30분 ~ 오후 7시 30분", "logo" => "img/SK렌터카.PNG", "link" => "https://www.skdirect.co.kr"],
    ["name" => "현대렌터카", "number" => "1566-3629", "address" => "서울시 마포구 매봉산로 80(상암동) PARK M 2층 10호", "hours" => "오전 8시 - 오후 8시", "logo" => "img/현대렌터카.PNG", "link" => "https://www.hdrentcar.co.kr/"],
    // 더 많은 데이터 추가 가능
];

// 페이지당 출력할 회사 수
$itemsPerPage = 3; 

// 현재 페이지 번호 가져오기 (디폴트는 1)
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 페이지에 맞는 회사 리스트 가져오기
$startIndex = ($currentPage - 1) * $itemsPerPage;
$companiesToShow = array_slice($companies, $startIndex, $itemsPerPage);

// 전체 페이지 수 계산
$totalPages = ceil(count($companies) / $itemsPerPage);
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>렌터카 회사 정보</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
      }
      header.top-header {
        background-color: #0078d7;
        color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      header.top-header .logo {
        font-size: 1.5rem;
        font-weight: bold;
      }

      header.top-header .menu {
        cursor: pointer;
      }

      header.main-header {
        background-color: #f1f1f1; /* 원하는 배경색으로 수정 가능 */
        padding: 20px;
        text-align: center;
      }

      header.main-header h1 {
        margin: 0;
        font-size: 2rem;
      }

      header.main-header p {
        font-size: 1rem;
      }

      .container {
        padding: 20px;
      }

      header {
        background-color: #f0e68c;
        padding: 20px;
        text-align: center;
      }
      header h1 {
        margin: 0;
        font-size: 24px;
      }
      .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      .company-list {
        margin-top: 20px;
      }
      .company-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .company-item:last-child {
        border-bottom: none;
      }
      .company-details {
        flex-grow: 1;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd; /* 이미지 옆에 선 추가 */
        padding-bottom: 10px;
        margin-bottom: 10px;
      }
      .company-details img {
        width: 100px; /* 로고 크기 */
        height: auto;
        margin-right: 20px; /* 로고와 텍스트 간 간격 */
      }
      .company-details p {
        margin: 5px 0;
      }
      .company-action {
        margin-left: 20px;
        flex-shrink: 0;
      }
      .company-action a {
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
      }
      .company-action a:hover {
        background-color: #0056b3;
      }
      .pagination {
        text-align: center;
        margin-top: 20px;
      }
      .pagination a {
    margin: 0 5px;
    padding: 8px 16px;
    border: 1px solid #ddd;
    background-color: #fff;
    text-decoration: none;
    color: #007bff;
    cursor: pointer;
    border-radius: 4px;
}

.pagination a:hover {
    background-color: #007bff;
    color: white;
}

.pagination a.active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}
      .search-bar{
        text-align: right;
        margin-top:20px;
      }
 
    
    </style>
  </head>
  <body>
    <header class="top-header">
      <div class="logo">KyuCar</div>
      <div class="menu">
        <a href="index.php">🏠Home</a>
      </div>
    </header>
    <header>
      <h1>렌터카 회사 정보</h1>
      <hr />
      <p><b><u>KyuCar</b></u>에서 조회 가능한 렌터카 회사 정보입니다.</p>
    </header>
    <div class="container">
      
    <div><input type="text" id="search-input" placeholder="회사 이름을 검색하세요..."  ></div>
      <div class="company-list">
      <?php foreach ($companiesToShow as $company): ?>
        <div class="company-item">
          <div class="company-details">
            <img src="<?php echo $company['logo']; ?>" alt="<?php echo $company['name']; ?> 로고" />
            <div>
              <p><strong>회사명:</strong> <?php echo $company['name']; ?></p>
              <p><strong>회사번호:</strong> <?php echo $company['number']; ?></p>
              <p><strong>회사주소:</strong> <?php echo $company['address']; ?></p>
              <p><strong>서비스시간:</strong> <?php echo $company['hours']; ?></p>
            </div>
          </div>
          <div class="company-action">
            <a href="<?php echo $company['link']; ?>" target="_blank">확인하러 가기</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="pagination">
        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
          <a href="?page=<?php echo $page; ?>" class="pagination-link <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
            <?php echo $page; ?></a>
        <?php endfor; ?>
      </div>
    </div>
  </body>
</html>
