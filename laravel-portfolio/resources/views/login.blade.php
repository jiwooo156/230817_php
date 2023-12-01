@extends('inc.layout')
@section('main')
	<div class="login-view">
		<div class="sign-title">
			<h3 class="s-title">
				<span>로그인</span>
			</h3>
		</div>
		<form action="#" id="user_login_form" name="user_login_form">
			@csrf
			<h6 class="text-label">
				<span>아이디</span>
			</h6>
			<label for="u_id">
				<input type="text" id="u_id" class="textfield">
				<span class="text_placeholder">아이디를 입력하세요</span>
			</label>
			<h6 class="text-label">
				<span>비밀번호</span>
			</h6>
			<label for="u_pw">
				<input type="text" id="u_pw" class="textfield">
				<span class="text_placeholder">비밀번호를 입력하세요</span>
			</label>
			<label for="remember_id">
				<input type="checkbox" id="remember_id">
				<span>아이디 저장</span>
			</label>
			<div class="login_foot">
				<button type="submit">
					<b>로그인</b>
				</button>
				<a class="" href="#">
					<span>회원가입</span>
				</a>
			</div>
			<a href="/user/login" class="u_login">로그인</a>
			<a href="#" class="u_register">회원가입</a>
		</form>
	</div>
@endsection