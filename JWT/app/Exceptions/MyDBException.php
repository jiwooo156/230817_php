<?php

namespace App\Exceptions;

use Exception;

// DB에러는 여기서 처리됨
class MyDBException extends Exception
{
        /**
     * 에러 메세지 저장
     * 
     * @return Array 에러메세지 배열
     */
    public function context() {
        return  [
            'E80' => ['status' => 401, 'msg' => 'DB 에러']
        ];
    }
}
