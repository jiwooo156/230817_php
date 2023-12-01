<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
	public function loginget() {
		// 로그인 성공 시 라우터 호출()
		if(Auth::check()) {
			return redirect()->route('board.index');
		}
		return view('login');
	}
}