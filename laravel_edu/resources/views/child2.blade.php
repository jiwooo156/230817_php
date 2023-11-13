
{{-- 상속 --}}
@extends('inc.layout')


{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
{{-- @section('title', '자식2 타이틀') --}}

@section('main')
	{{-- 구구단 --}}
	@for($i = 1; $i <= 9; $i++)
		<p>{{$i}}단</p>
		@for($a = 1; $a <=9; $a++)
			<span>{{$i.' x '.$a.' = '.($i*$a)}}</span>
			<br>
		@endfor
	@endfor

@endsection