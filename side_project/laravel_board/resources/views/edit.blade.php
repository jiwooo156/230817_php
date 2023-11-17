@extends('layout.layout')

@section('title', 'edit')

@section('main')
	<main>
		<form action="{{route('board.update', ['board' => $data->b_id])}}" method="post">
			@include('layout.errorlayout')
			@csrf
			@method('PUT')
			<div>번호 : {{$data->b_id}}</div>
			<div>조회수 : {{$data->b_hits}}</div>
			<div>
				<label for="b_title">제목 : </label>
				<input type="text" id="b_title" name="b_title" value="{{$data->b_title}}">
			</div>
			<div>
				<label for="b_content">내용 : </label>
				<input type="textarea" id="b_content" name="b_content" value="{{$data->b_content}}">
			</div>
			<div>작성일 : {{$data->created_at}}</div>
			<div>수정일 : {{$data->updated_at}}</div>
			<button type="submit">수정완료</button>
		</form>
		<a href="{{route('board.show',['board' => $data->b_id])}}">수정취소</a>
	</main>
@endsection