<?php
// 파일 열기
$file = fopen('19dan.txt','a');

// 파일 작성
// 19단

// echo "19단\n";
fwrite($file, "19단\n");

for($i = 1; $i <= 9; $i++) {

	$mul = 19 * $i;
	$result = "19 X {$i} = {$mul}\n";
	$f_write = fwrite($file, $result);
	// 바이너리로 작성할 때는 f_write, 그냥 문자열로 작성할 때는 fputs 쓴다.
}

// 파일 닫기
fclose($file);
?>