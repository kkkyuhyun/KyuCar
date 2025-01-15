<h1>PHP와 MySQL 기반의 렌터카 웹페이지 제작</h1>

<body><b><u> * 메인 화면</b></u></body><br>
<img src="https://github.com/user-attachments/assets/d14a8e0a-e491-488e-ba6a-49ce4e270ab8" width=400 height=300><br>
<br>
<body><b><u> * 렌터카 목록 페이지</b></u></body><br>
<img src="https://github.com/user-attachments/assets/577f6d2f-6fd3-4e79-95b3-65e08e3fa707" width=400 height=300><br>
<br>
<body><b><u> * 렌터카 회사 페이지</b></u></body><br>
<img src= "https://github.com/user-attachments/assets/e6977c8f-4adc-4346-98f2-435c9b940954" width=400 height=300><br>
<br>
<br>
<img src="https://github.com/user-attachments/assets/0628fbff-d1dc-462a-ae60-f27f0d092c3a" width=400 height=300><br>

<body><b><u> * 차량 창고_현재 등록된 차량 확인 - 추가 수정 삭제 페이지 </b></u></body><br>
<img src= "https://github.com/user-attachments/assets/68864a9c-68a9-47c8-93fd-07e04acd4687" width=400 height=300><br>
<br>
<br>
<body><b><u>* 회사 창고_등록된 회사 확인- 추가 수정 삭제 페이지 </b></u></body><br>
<img src="https://github.com/user-attachments/assets/c17f1848-037c-4b49-a7c9-28b44a8accd1" width=400 height=300><br>
<br>
<body><b><u>* 렌트 예약 폼</b></u></body><br>
<img src="https://github.com/user-attachments/assets/d9a9f2ff-4a37-4e70-91b8-704574e1659b" width=400 height=300><br>
<br>
<body><b><u>* 결제 창</b></u></body><br>
<img src="https://github.com/user-attachments/assets/f2d660a6-e1ec-479a-a6e6-ee42d7216a17" width=400 height=300><br>

## 프로젝트를 진행하면서 배운 점 
PHP와 MySQL기반의 웹페이지 풀스택 과정을 스스로 직접 제작해 보았다는 점에서 의미가 깊었다. KB IT's Your Life 5기 웹개발 프로젝트 '편리한 금융생활을 위한 전자지갑 개발' 프로젝트 이후 첫 풀스택 개발 프로젝트였는데 혼자서 직접 시스템 분석과 요구사항 - UIUX설계 - ERD설계 - 디자인 -웹 페이지 제작과 기본적인 CRUD - 소스코드 검토 - 시행 테스트 일련의 모든 과정을 거쳤는데 학습에 큰 도움이 되었고 DB 공부와 개발 공부에 큰 힘이 되었다. 

## 프로젝트를 하면서 아쉬운 점 
제한된 기한(5일이라는 기간동안) 기본적으로 완성도가 다소 떨어진 작품이었다는 것이다. PHP라는 언어를 처음 배우고 직접 DB연동까지 갔는데 쉽지 않았다. 원래 차량 창고의 현재 등록된 차량과 회사 창고의 현재 등록된 회사에 입력 생성 수정 삭제를 할 경우 위에 있는 카테고리에 들어가서 내가 설계해놓은 UI에 반영하여 이미지가 삭제되고 또 추가되는 연동 시스템까지 넣고 싶었는데 쉬운 작업이 아니어서 시도하기 벅찼다. 그리고  ERD 설계의 중요성을 알았다. 사실 첫 ERD 설계할 때 car 테이블과 company 테이블 user 테이블의 공통적인 Primay Key를 varchar 타입으로 설정하였다. 하지만 PK는 int auto_increment로 설정해서 나중에 제작을 위해서 그랬어야만 했는데 내 실수였다. (그래도 varchar로 할 수는 있다..) order테이블에 primary key 또한 varchar로 제작했어서 int타입으로 alter를 써서 수정하였다. ERD 설계를 신중하게 할 필요가 있다는 점을 절실하게 느꼈다. 

## 향후 개선 계획
- 텍스트 마이닝 기반 리뷰 분석 및 딥러닝 추천 알고리즘 도입.
- 챗봇을 활용한 맞춤형 렌터카 추천 시스템 "카봇" 개발.
- UI와 데이터베이스 간 연동 시스템 고도화.
