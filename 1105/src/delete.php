<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105/src/"); 
define("FILE_HEADER",ROOT."header.php");
define("ERROR_MSG_PARAM", "Parameter Error : %s");
require_once(ROOT."lib/lib.php");

$arr_err_msg = []; // 에러 메세지 저장용

try {
	$conn = null; 

	if(!my_db_conn($conn)) {
		// 2-2. 예외 처리
		throw new Exception("DB Error : PDO Instance");
	}

	$http_method = $_SERVER["REQUEST_METHOD"];

    
	if($http_method === "GET") {
        // GET Method
		$id = isset($_GET["id"]) ? $_GET["id"] : "";
		$page = isset($_GET["page"]) ? $_GET["page"] : "";

		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
		
		$arr_param = [
			"id" => $id
		];

		$result = db_select_boards_id($conn, $arr_param);

		if($result === false) {
			throw new Exception("DB Error : Select id");
		} else if(!(count($result) === 1)) {
			throw new Exception("DB Error : Select id Count");
		}

		$item = $result[0];

	} else {
        // POST Method
		$id = isset($_POST["id"]) ? $_POST["id"] : "";
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

		$conn->beginTransaction();

		$arr_param = [
			"id" => $id
		];

		if(!db_delete_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Delete Boards id");
		}

		$conn->commit(); 
		header("Location: /1105/src/list.php"); 
		exit; 
	}
} catch(Exception $e) {
	if($http_method === "POST") {
		$conn->rollBack(); 
	}
	echo $e->getMessage(); // 예외발생 메세지 출력  
	// header("Location: /1105/src/error.php/?err_msg={$e->getMessage()}"); 
	exit; 
} finally {
	db_destroy_conn($conn); 
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/1105/src/css/common.css">
	<title>삭제 페이지</title>
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<main class="container">
		<table class="table-striped">
			<tr>
				<th class="radius-left">게시글 번호</th>
				<td class="radius-right"><?php echo $item["id"] ?></td>
                <th class="radius-left">작성일</th>
				<td class="radius-right"><?php echo $item["create_at"] ?></td>
                <th class="radius-left">제목</th>
				<td class="radius-right"><?php echo $item["title"] ?></td>
            </tr>
            <caption>
                당신의 추억
                <br>
                정말로 삭제 하시겠습니까?
                <br><br>
            </caption>
		</table>

		<section class="button">
			<form action="/1105/src/delete.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<button class="button_a" type="submit">진짜 삭제</button>
				<a class="button_a" href="/1105/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">보류</a>
			</form>
		</section>
	</main>
</body>
</html>