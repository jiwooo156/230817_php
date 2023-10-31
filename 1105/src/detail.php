<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105/src/"); 
define("FILE_HEADER",ROOT."header.php");
define("ERROR_MSG_PARAM", "Parameter Error : %s");
require_once(ROOT."lib/lib.php");

$id = ""; // 게시글 id
$conn = null; // DB Connect
$arr_err_msg = []; // 에러 메세지 저장용

try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

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
		var_dump($result);
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		throw new Exception("DB Error : PDO Select_id count");
	}

	$item = $result[0];
} catch(Exception $e) {
	// echo $e->getMessage(); // 예외발생 메세지 출력 
	header("Location: /1105/src/error.php/?err_msg={$e->getMessage()}"); 
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
	<title>상세 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main class="container">
		<table class="table-striped">
			<!-- <tr>
				<th class="radius-left">게시글 번호</th>
				<td class="detail-table"><?php //echo $item["id"]; ?></td>
			</tr> -->
			<tr>
                <!-- <th class="radius-left">id</th> -->
                <td class="detail-table detail-box"><?php echo $item["id"]; ?></td>
				<!-- <th class="radius-left">제목</th> -->
				<td class="detail-table detail-box"><?php echo $item["title"]; ?></td>
                <!-- <th class="radius-left">작성일자</th> -->
				<td class="detail-table detail-box"><?php echo $item["create_at"]; ?></td>
			</tr>
			<tr>
				<!-- <th class="radius-left">내용</th> -->
				<td class="detail-cntt"><?php echo $item["content"]; ?></td>
			</tr>
		</table>
		<section class="button">
			<a class="button_a" href="/1105/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
			<!-- <a class="button_a" href="/1105/src/list.php/?page=<?php echo $page; ?>">취소</a> -->
			<a class="button_a" href="/1105/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
		</section>
	</main>
</body>
</html>