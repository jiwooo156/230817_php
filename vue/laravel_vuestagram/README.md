E01 : 데이터 유효성 에러
E02 : 미인증 에러
E03 : URL 에러
E99 : 시스템 에러


신규 생성 및 수정 리스트
app/
    Exceptions/
        Handler.php     예외 발생 처리 추가
    Http/
        Controllers/
            BoardsController.php
        Middleware/
            ApiChkToken.php     토큰체크 미들웨어
        Kernel.php
    Models/
        Board.php
config/
    app.php
database/
    migrations/
        2023_07_04_141759_create_boards_table.php
    seeders/
        BoardSeeder.php
public/
    img/    이미지 저장 디렉토리
routes/
    api.php
    web.php
.env.example        Authorization용 키(APP_AUTHORIZATION_KEY) 추가


<!-- 라라벨 인스톨 -->
    composer create-project laravel/laravel="9" 디렉토리명
    php artisan key:generate    앱 key 설정
    php artisan migrate         마이그레이션 저장소 생성
    php artisan db:seed         Database\Seeders\DatabaseSeeder 클래스를 실행


<!-- 뷰설정 -->
    npm install   뷰 install
    npm install vue-router@4    라우터 설정
    npm install vuex@next --save   뷰엑스설치
    npm install axios   엑시오스설치
    npm install --save-dev vue    디펜던시에 뷰 추가
    npm run serve 
    npm run dev  
    npm run watch                 Css와 Js파일의 변경 부분이 있을 경우 자동으로 탐지하여 컴파일을 시켜준다.



<!-- 에러 -->
    npm install --``save-dev vue-loader 모듈없어서 에러날때 설치



composer clear-cache
composer clearcache