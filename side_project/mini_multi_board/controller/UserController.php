<?php

namespace controller;

use model\UserModel;
class UserController extends ParentsController {
    // 로그인
    protected function loginGet() {
        // 해당하는 경로를 require함.
        return "view/login.php";
    }

    // 로그인 처리
    protected function loginPost() {
        // ID, PW 설정(DB에서 사용할 데이터 가공)
        $arrInput = [];
        // id 받아옴
        $arrInput["u_id"] = $_POST["u_id"];
        // 받아온 pw를 암호화해줌
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

        $modelUser = new UserModel();
        $resultUserInfo = $modelUser->getUserInfo($arrInput, true);

        // User 유무 체크
        if(count($resultUserInfo) === 0) {
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인 해 주세요.";
            // 로그인 페이지로 리턴
            return "view/login.php";
        }

        // 세션에 u_id 저장
        $_SESSION["u_pk"] = $resultUserInfo[0]["id"];
        // 무조건 b_type을 보냄
        return "Location: /board/list?b_type=0";
    }

    // 로그아웃 처리
    protected function logoutGet() {
        // session에 있는 요소를 다 비워주는 함수
        session_unset();
        // session에 있는 id 파기해주는 함수
        session_destroy();
        
        // 로그인 페이지 리턴
        return "Location: /user/login";
    }

    // 회원가입 페이지 이동
    protected function registGet() {
        return "view/regist"._EXTENSION_PHP;
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}
