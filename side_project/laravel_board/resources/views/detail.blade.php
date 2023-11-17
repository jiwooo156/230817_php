@extends('layout.layout')

@section('title', 'detail')

@section('main')
	<main>
		<div>번호 : {{$data->b_id}}</div>
		<div>조회수 : {{$data->b_hits}}</div>
		<div>제목 : {{$data->b_title}}</div>
		<div>내용 : {{$data->b_content}}</div>
		<div>작성일 : {{$data->created_at}}</div>
		<div>수정일 : {{$data->updated_at}}</div>

		<form action="{{route('board.destroy', ['board' => $data->b_id])}}" method="post">
			@csrf
			@method('DELETE')
			<button class="btn btn-dark" type="submit">삭제</button>
		</form>
		<a class="btn btn-dark" href="{{route('board.edit', ['board' => $data->b_id])}}">수정</a>
		<a class="btn btn-dark" href="{{route('board.index')}}">나가기</a>
	</main>
@endsection