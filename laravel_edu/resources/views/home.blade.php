<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
</head>
<body>
	<h1>HOME!!!!!</h1>
	<br>
	<br>
	<form action="/home" method="post">
		<!-- form태그 안에 @csrf를 입력하면 자동으로 csrf테러를 방어해줌 -->
		@csrf
		<button type="submit">POST</button>
	</form>
	<br>
	<br>
	<form action="/home" method="post">
		@csrf
		@method('PUT')
		<button type="submit">PUT</button>
	</form>
	<br>
	<br>
	<form action="/home" method="post">
		@csrf
		@method('DELETE')
		<button type="submit">DELETE</button>
	</form>
</body>
</html>