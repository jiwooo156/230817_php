<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Token;
use Exception;
use App\Exceptions\MyDBException;
use App\Http\Utils\TokenUtil;
use Carbon\Carbon;

class AuthController extends Controller
{
    protected $tokenDI;

    // 의존성 주입 (파라미터로 넣어놓으면 라라벨이 알아서 인식함)
    public function __construct(TokenUtil $tokenUtil) {
        $this->tokenDI = $tokenUtil;
    }

    /**
     * 로그인 처리
     * 
     * @param Illuminate\Http\Request $request 리퀘스트 객체
     * @return string json 엑세스토큰, 쿠키httponly 리플래쉬토큰
     */
    public function login(Request $request) {
        // 강제로 80번 에러 발생
        // throw new MyDBException('E80');

        // DB 유저정보 획득
        $userInfo = User::where('u_id', $request->u_id)
                    ->where('u_pw',$request->u_pw)
                    ->first();

        // 획득한 유저정보 NULL인지 확인
        if(is_null($userInfo)) {
            throw new Exception('E20');
        }

        // 토큰생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

        // 리플래쉬토큰 DB에 저장
        $ext = Carbon::createFromTimestamp($this->tokenDI->getPayloadValueTokey($refreshToken, 'ext'));

        try {
            DB::beginTransaction();
            Token::updateOrInsert(
                ['u_pk' => $this->tokenDI->getPayloadValueTokey($refreshToken, 'upk')]
                ,[
                    't_rt' => $refreshToken
                    ,'t_ext' => $ext->format('Y-m-d H:i:s')
                ]
            );
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception('E80');
        }

        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ],200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));
    }
}
