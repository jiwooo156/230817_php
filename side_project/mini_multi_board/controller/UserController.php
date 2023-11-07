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

    // 회원가입 처리
    protected function registPost() {
        $u_id = $_POST["u_id"];
        $u_pw = $_POST["u_pw"];
        $u_name = $_POST["u_name"];
        $arrAddUserInfo = [
            "u_id" => $u_id
            ,"u_pw" => $this->encryptionPassword($u_pw) // 비밀번호 암호화
            ,"u_name" => $u_name
        ];

        // 정규식(id, pw 체크해줌)
        // ex)  $pattern = "\^[a-zA-Z0-9!@_]{8,20}$/";

        $patternId = "/^[a-zA-Z0-9]{8,20}$/";
        $patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName = "/^[a-zA-Z가-힣]{2,50}$/u";

        // preg_match = 정규식이 있으면 return을 해줌. (int로 리턴. 매치되면 1이상, 매치안되면 0.)
        // else if로 묶지 않고 따로따로 해줌. 한번에 검사하게.
        if(preg_match($patternId, $u_id, $match) === 0) {
            // ID 에러처리
            $this->arrErrorMsg[] = "아이디는 영어대소문자와 숫자로 8~20자로 입력해 주세요.";
        }
        if(preg_match($patternPw, $u_pw, $match) === 0) {
            // PW 에러처리
            $this->arrErrorMsg[] = "비밀번호는 영어대소문자와 숫자, !, @로 8~20자로 입력해 주세요.";
        }
        if($u_pw !== $u_pw_chk) {
            $this->arrErrorMsg[] = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
        }
        if(preg_match($patternName, $u_name, $match) === 0) {
            // NAME 에러처리
            $this->arrErrorMsg[] = "이름은 영어대소문자와 한글로 2~50자로 입력해 주세요.";
        }
        
        // TODO : 아이디 중복 체크 필요 (select한 다음 count 1이라도 있으면 안되게)

        // 유효성 체크 실패
        if(count($this->arrErrorMsg) > 0) {
            return "view/regist.php";
        }

        // 유효성 체크 성공 - 인서트 처리
        $userModel = new UserModel();
        $userModel->beginTransaction();
        $result = $userModel->addUserInfo($arrAddUserInfo);

            // 인서트 실패
        if($result !== true) {
            $userModel->rollback();
        } else {
            // 인서트 성공
            $userModel->commit();
        }   
            // 파기
        $userModel->destroy();

        // url 로그인 처리하기위해서 location처리
        return "Location: /user/login";

    }

    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}
