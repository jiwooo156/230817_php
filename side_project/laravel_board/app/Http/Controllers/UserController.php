<?php

namespace App\Http\Controllers;
// 클래스 사용하려면 use 해줘야됨
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget() {
        // 로그인 한 유저는 board list로 이동
        if(Auth::check()) {
            return redirect()->route('board.index');
        }
        return view('login');
    }
    public function loginpost(Request $request) {
        // 유효성 검사
        $validator = Validator::make(
            $request->only('email', 'password')
            ,[
                // email 유효성 체크
                'email' => 'required|email|max:50'
                ,'password' => 'required'
            ]
        );

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            return view('login')->withErrors($validator->errors());
        } 

        // 유저 정보 습득(조회)
        $result = User::where('email', $request->email)->first();

        // 유저가 보내 온 비번, 암호화 처리 된 비번을 비교함
        if(!$result || !(Hash::check($request->password, $result->password))) {
            $errorMsg = '아이디와 비밀번호를 다시 확인해 주세요';
            return view('login')->withErrors($errorMsg);
        }

        // 유저 인증 작업
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('id'));
        } else {
            $errorMsg = "인증 에러가 발생했습니다.";
            return view('login')->withErrors($errorMsg);
        }


        return redirect()->route('board.index');
    }
    public function registrationget() {
        return view('registration');
    }
    public function registrationpost(Request $request) {
        // $request에는 회원가입정보 담겨있음
        
        // 유효성 검사
        $validator = Validator::make(
            $request->only('email', 'password', 'passwordchk', 'name')
            ,[
                // email 유효성 체크
                'email' => 'required|email|max:50'
                ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
                ,'password' => 'required|same:passwordchk'
                ]
            );
            
            // 유효성 검사 실패시 처리
            // 걸리면 다시 회원가입 페이지로 이동시킴
            if($validator->fails()) {
                return view('registration')->withErrors($validator->errors());
            }
            
            // 데이터 베이스에 저장할 데이터 획득
            $data = $request->only('email', 'password', 'name');
            // $request에 있는 데이터 중 only의 파라미터에 넣은 애들만 가져옴 (배열 형식으로 옴)
            
        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        
        // 회원정보 DB에 저장 (엘로퀀트 사용함)
        $result = User::create($data);

        
        return redirect()->route('user.login.get');
    }

    //-----------------------
    //  로그아웃
    //-----------------------
    public function logoutget() {
        Session::flush();   // 세션 파기
        Auth::logout(); // 로그아웃
        return redirect()->route('user.login.get');
    }
}
