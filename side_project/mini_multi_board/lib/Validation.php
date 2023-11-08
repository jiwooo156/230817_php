<?php

namespace lib;

class Validation {
    private static $arrErrorMsg = [];   // 발리데이션용 에러메세지 저장 프로퍼티

    // getter : 에러메세지 반환용 메소드
    // private로 변수설정 : 원본데이터를 수정하지못함 publick으로 getter메소드 생성 : 데이터 가져와서 쓸 수는 있음. 수정은 못함
    public static function getArrErrorMsg() {
        return self::$arrErrorMsg;
    }

    // setter : 에러메세지 저장용 메소드
    public static function setArrErrorMsg($msg) {
        self::$arrErrorMsg[] = $msg;
        // self::$arrErrorMsg[]에 $msg를 추가하는 것.
    }
    
    // 유효성 체크 메소드
        // return 타입이 boolean이 아니면 에러남
        // $inputData는 파라미터
    public static function userChk(array $inputData) : bool {
        $patternId = "/^[a-zA-Z0-9]{8,20}$/";
        $patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName = "/^[a-zA-Z가-힣]{2,50}$/u";

        // preg_match = 정규식이 있으면 return을 해줌. (int로 리턴. 매치되면 1이상, 매치안되면 0.)
        // else if로 묶지 않고 따로따로 해줌. 한번에 검사하게.

        // 아이디 체크
        if(array_key_exists("u_id", $inputData)) {
            // inputData 배열에 u_id가 있으면 아래의 if문 실행함
            if(preg_match($patternId, $inputData["u_id"], $match) === 0) {
            // ID 에러처리
            $msg = "아이디는 영어대소문자와 숫자로 8~20자로 입력해 주세요.";
            self::setArrErrorMsg($msg);
            }
        }

        // 비밀번호 체크
        if(array_key_exists("u_pw", $inputData)) {
            if(preg_match($patternPw, $inputData["u_pw"], $match) === 0) {
            // PW 에러처리
            $msg = "비밀번호는 영어대소문자와 숫자, !, @로 8~20자로 입력해 주세요.";
            self::setArrErrorMsg($msg);
            }
        }
        
        // 비밀번호 확인 체크
        // 회원가입, 로그인, 회원수정에서도 쓰기때문에 받는 항목이 다르므로 항목이 있을때만 체크하도록 하기 위해서 비밀번호 확인 체크를 따로 나눠서 체크하게 함
        if(array_key_exists("u_pw_chk", $inputData)) {
            if($inputData["u_pw"] !== $inputData["u_pw_chk"]) {
                // PW 확인 에러처리
                $msg = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
                self::setArrErrorMsg($msg);
            }
        }

        // 이름 체크
        if(array_key_exists("u_name", $inputData)) {
            if(preg_match($patternName, $inputData["u_name"], $match) === 0) {
                // NAME 에러처리
                $msg = "이름은 영어대소문자와 한글로 2~50자로 입력해 주세요.";
                self::setArrErrorMsg($msg);
            }
        }

        // 리턴 처리
        if(count(self::$arrErrorMsg) > 0) {
            return false;
        }

        return true;
    }
}

// $arr = [
//     "u_id" => "admin"
//     ,"u_pw" => "12345678"
// ];

// var_dump(Validation::userChk($arr));    // bool(false)

// var_dump(Validation::getArrErrorMsg()); // 아이디에 대한 에러메세지 뜸