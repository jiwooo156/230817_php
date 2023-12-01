@extends('inc.layout')
@section('main')
	<div class="register_view">
		<form action="{{ route('user.register.post') }}" class="rg_form">
			<label for="u_name">이름</label>
			<input type="text" class="u_name" id="u_name" placeholder="이름을 입력하세요">
			<label for="u_id">아이디</label>
			<input type="text" class="u_id" id="u_id" placeholder="아이디를 입력하세요">
			<label for="u_pw">비밀번호</label>
			<input type="text" class="u_pw" id="u_pw" placeholder="비밀번호를 입력하세요">
			<label for="u_pwchk">비밀번호 확인</label>
			<input type="text" class="u_pwchk" id="u_pwchk" placeholder="비밀번호 확인을 입력하세요">
			<button type="submit" class="btn_register">회원가입</button>
			<a class="a_cancel" href="{{ route('user.login.get') }}">취소</a>
		</form>
	</div>
@endsection