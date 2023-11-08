<?php

namespace controller;

use model\UserModel;
use lib\Validation;

class UserController extends ParentsController {
    // 로그인
    protected function loginGet() {
        // 해당하는 경로를 require함.
        return "view/login.php";
    }

    // 로그인 처리
    protected function loginPost() {
        $InputData = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        if(!Validation::userChk(
            
        )) {
            // $this->arrErrorMsg : 부모컨트롤러에 선언되어있음. 
            $this->arrErrorMsg = Validation::getArrErrorMsg();
            return "view/login.php";
        }

        // ID, PW 설정(DB에서 사용할 데이터 가공)
        $arrInput = [];
        // id 받아옴
        $arrInput["u_id"] = $_POST["u_id"];
        // 받아온 pw를 암호화해줌
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

        // 유저 정보 획득
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
        // 유효성체크에 파라미터로 넘겨줄 애들
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw_chk" => $_POST["u_pw_chk"]
            ,"u_name" => $_POST["u_name"]
        ];

        $arrAddUserInfo = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $this->encryptionPassword($_POST["u_pw"]) // 비밀번호 암호화
            ,"u_name" => $_POST["u_name"]
        ];

        // 정규식(id, pw 체크해줌)
        // ex)  $pattern = "\^[a-zA-Z0-9!@_]{8,20}$/";

        // TODO : 발리데이션 체크
        
        // TODO : 아이디 중복 체크 필요 (select한 다음 count 1이라도 있으면 안되게)

        // 유효성 체크 실패 시- 에러메세지
        if(!Validation::userChk($_POST)) {
            // $this->arrErrorMsg : 부모컨트롤러에 선언되어있음. 
            $this->arrErrorMsg = Validation::getArrErrorMsg();
            return "view/regist.php";
        }

        // TODO : 아이디 중복 체크 필요

        // 유효성 체크 성공 시 - 인서트 처리
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

    // 아이디 중복 체크 함수
    protected function idChkPost() {
        // Model 인스턴스 (DB연동 및 쿼리문 가져오려고)
        $userModel = new UserModel();

        $errorFlg = "0";
        $errorMsg = "";

        // input에서 입력값 $_POST로 받아옴
        $inputData = [
			"u_id" => $_POST["u_id"]
		];
        
        // 유효성 체크
        if(!Validation::userChk($inputData)) {
            $errorFlg = "1";
            $errorMsg = Validation::getArrErrorMsg()[0];   // 에러발생 : $errorMsg에 메세지 삽입.
        }

        // Model의 메소드에 접근 ($result = DB에서 select로 받아옴)
        $result = $userModel->getUserInfo($inputData);
        $userModel->destroy();

        // User 유무 체크 (중복체크)
        // $arrTmp = [
        //     "errflg" => "0"
        //     ,"msg" => "사용 가능 한 아이디입니다."
        // ];

        // if(count($result) > 0) {
        //     $errorFlg = "1";
        //     $errorMsg = "";
        //     $inputData = [
        //         "u_id" => $u_id
        //     ];
        // }


        if(count($result) > 0) {
			$errorFlg = "1";
			$errorMsg = "중복된 아이디입니다.";
		}
				
		// response 처리
		$response = [
			"errflg" => $errorFlg
			,"msg" => $errorMsg
		];
        
        // content-type는 데이터의 형식이 json이라고 알려주는 역할
        header('Content-type: application/json');
        // 배열을 json 형태(문자열 데이터)로 바꾸고 js로 보내줌
        echo json_encode($response);
        exit();
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}
