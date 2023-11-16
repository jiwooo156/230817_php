@extends('layout.layout')

@section('title', 'Create')

@section('main')
	<main>
		<form action="{{route('board.store')}}" method="post">
			@include('layout.errorlayout')
			{{-- csrf안하면 submit했을 때 419에러 뜸 --}}
			@csrf	
			<div>
				<label for="b_title">제목 : </label>
				<input type="text" id="b_title" name="b_title">	
			</div>
			<div>
				<label for="b_content">내용 : </label>
				<input type="textarea" id="b_content" name="b_content">	
			</div>
			<button type="submit">작성</button>
			<a href="{{route('board.index')}}">취소</a>
		</form>
	</main>
@endsection