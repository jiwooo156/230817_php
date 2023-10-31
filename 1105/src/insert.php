<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105/src/"); 
define("FILE_HEADER",ROOT."header.php");
define("ERROR_MSG_PARAM", "Parameter Error : %s");
require_once(ROOT."lib/lib.php");

$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg = []; // 에러 메세지 저장용
$title = "";
$content = "";

if($http_method === "POST") {
	try {
		$title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 셋팅
		$content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 셋팅

		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
		}
		
		if(count($arr_err_msg) === 0) {
			// DB 접속
			if(!my_db_conn($conn)) {
				// DB Instance 에러
				throw new Exception("DB Error : PDO Instance");
			}
			$conn->beginTransaction(); // 트랜잭션 시작

			$arr_param = [
				"title" => $_POST["title"]
				,"content" => $_POST["content"]
			];

			if(!db_insert_boards($conn, $arr_param)) {
				throw new Exception("DB Error : Insert Boards");
			}

			$conn->commit(); 
            
			header("Location: /1105/src/list.php");
			exit;
		}
	} catch(Exception $e) {
		if($conn !== null){
			$conn->rollBack();
		}
		header("Location: /1105/src/error.php/?err_msg={$e->getMessage()}");
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
	<link rel="stylesheet" href="/1105/src/css/common.css">
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
		<form action="/1105/src/insert.php" method="post">
			<table class="table-striped">
				<tr>
					<th class="insert-tit">
						<label class="title" for="title">제목</label>
					</th>
					<td>
						<input type="text" name="title" id="title" value="<?php echo $title ?>">
					</td>
				</tr>
				<tr>
					<!-- <th class="insert-cont">
						<label  for="content">내용</label>
					</th> -->
					<td>
					<textarea rows="6" cols="10" name="content" id="content" placeholder="오늘의 기분은?"><?php echo $content ?></textarea>
					</td>
				</tr>
			</table>
			<section class="button">
				<button class="btn-insert" type="submit">작성</button>
				<a class="btn-insert" href="/1105/src/list.php">취소</a>
			</section>
		</form>
	</main>
</body>
</html>