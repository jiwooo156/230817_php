<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); 		// 파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB Connection 변수

// POST로 request가 왔을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg = [];		// 에러 메세지 저장용
$title = "";
$content = "";

// POST로 request가 왔을 때 처리
if($http_method === "POST") {
	try {
		$arr_post = $_POST;
		//파라미터  획득
		$title = isset($_POST["title"]) ? trim($_POST["title"]) : "";		// title 셋팅
		$content = isset($_POST["content"]) ? trim($_POST["content"]) : "";		// content
		
		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
		}
		if($content === ""){
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
		}
	
		if(count($arr_err_msg) === 0) {
				// DB 접속
			if(!my_db_conn($conn)) {
				// DB Instance 에러
				throw new Exception("DB Error : PDO Instance");
			}
			$conn->beginTransaction(); // 트랜잭션 시작

			// insert
			if(!db_insert_boards($conn, $arr_post)) {
				// DB Insert 에러
				throw new Exception("DB Error : Insert Boards");
			}

			$conn->commit(); // 모든 처리 완료 시 커밋

			// 리스트 페이지로 이동
			header("Location: list.php");
			exit;
		}

	} catch(Exception $e) {
		if($conn !== null){
		$conn->rollBack();
		}
		// echo $e->getMessage(); // Exception 메세지 출력
		header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}");	// v002 add
		exit;
	} finally {
		db_destroy_conn($conn); // DB 파기
	}
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>작성 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main class="container">
		<?php
			foreach($arr_err_msg as $val) {
		?>
			<p><?php echo $val ?></p>
		<?php
			}
		?>
		<form action="/mini_board/src/insert.php" method="post">
			<label for="title">제목 : </label>
			<input type="text" name="title" id="title" value="<?php echo $title ?>">
			<br>
			<label for="content">내용 : </label>
			<textarea name="content" id="content" cols="30" rows="20"><?php echo $content ?></textarea>
			<br>
			<button type="submit">작성</button>
			<a href="/mini_board/src/list.php">취소</a>
		</form>
	</main>
</body>
</html>