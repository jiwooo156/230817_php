<?php

namespace controller;

class ParentsController {
    protected $controllerChkUrl; // 헤더 표시 제어용 문자열
    protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트
    // 비로그인 시 접속 불가능한 URL 리스트
    private $arrNeedAuth = [
        "board/list"
    ];

    public function __construct($action) {
        // loginGet이 $action에 담김? = 파라미터로 쓴다는 것임. $action변수에 담기는게 아니라
        // 뷰 관련 체크 접속 URL 셋팅
        $this->controllerChkUrl = $_GET["url"];
        

        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }

        // User 로그인 및 권한 체크
        $this->chkAuthorization();


        // controller 메소드 호출
        $resultAction = $this->$action();

        // view 호출
        $this->callView($resultAction);
        exit();
    }
    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"];
        if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth)) {
            header("Location: /user/login");
            exit();
        }
        
    }

    // 뷰 호출용 메소드
    private function callView($path) {
        // view/list.php  require_once로 view파일 불러옴  (url 바뀜)
        // Location: /board/list  responce해서 다시 요청이 옴  (url 안바뀜)
        if(strpos($path, "Location:") === 0) {
            header($path);
            exit();
        } else {
            require_once($path);  
        }
    }
}
