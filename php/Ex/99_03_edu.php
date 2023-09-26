<?php
	// print_r($_SERVER);
	print_r($_GET);
	print_r($_POST);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="/99_03_edu.php" method="post">
	<!-- root = apache24/htdocs(설정파일에 저 폴더를 root로 설정했기 때문.) (htdocs의 99_03_edu.php로 이동하겠다)
		 method = 뭘로 보내줄건지 ( get인지 post인지 ) (form태그의 method는 get,post 밖에 없음)-->
		<br>
		<label for="id">ID</label>
		<input type="text" name="id">
		<br>
		<label for="pw">PW</label>
		<input type="text" name="pw">
		<br>
		<input type="hidden" name="name" value="미어캣">
		<button type="submit">post</button>
	</form>
</body>
</html>