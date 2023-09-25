<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");   // ROOT의 절대주소
define("FILE_HEADER", ROOT."header.php"); 
require_once(ROOT."lib/lib_db.php"); 

$conn = null;  // DB 연결용 변수
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; 		// id셋팅  GET에 id있는지 확인 후, 있으면 GET으로 넘기고 없으면 POST로 넘김.
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; 		// page 세팅
$http_method = $_SERVER["REQUEST_METHOD"]; 		// method 확인

try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

	if($http_method === "GET"){
		// GET Method의 경우
		// 게시글 데이터 조회를 위한 파라미터 세팅
		$arr_param = [
			"id" => $id
		];
		//게시글 데이터 조회
		$result = db_select_boards_id($conn, $arr_param);
		//게시글 조회 예외처리
		if($result === false) {
			throw new Exception("DB Error : PDO select_id");
		} else if(!(count($result) === 1)) {
			// 게시글 조회 count 에러
			throw new Exception("DB Error : PDO select_id Count,".count($result));
		}
		$item = $result[0];  // 쓰기편하려고 (2차원배열을 1차원배열처럼 쓸수있게함)

	}else {
		// POST Method의 경우
		// 게시글 수정을 위해 파라미터 세팅
		$arr_param = [
			"id" => $id
			,"title" => $_POST["title"]
			,"content" => $_POST["content"]
		];

		// 게시글 수정 처리
		$conn->beginTransaction();  // Transaction 시작   // 데이터 무결성을 위해서 하는 것임.

		if(!db_update_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Update_Boards_id");
		}
		$conn->commit();  // commit		// 더이상 갱신할 데이터가 없으니까 커밋 해줌
		
		// detail 페이지로 이동
		header("Location: detail.php/?id={$id}&page={$page}");  
		exit;
	}

} catch(Exception $e) {
	if($http_method === "POST"){
		$conn->rollback();    // POST 일때만 rollback하게 함.
	}
	echo $e->getMessage(); 
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">    //ROOT의 상대주소
	<title>수정 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<form action="/mini_board/src/update.php" method="post">  // action : 이동 할 파일path 
		<table>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
				<tr>
					<th>글 번호</th>
					<td><?php echo $item["id"]; ?></td>
				</tr>
				<tr>
					<th>제목</th>
					<td>
						<input type="text" name="title" value="<?php echo $item["title"]; ?>">	// user가 input으로 입력할 수 있게 함. (기본 제목은 title)
					</td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"];?></textarea>
					</td>
				</tr>
			</table>
			<button type="submit">수정확인</button>
			<a href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
	</form>		
</body>
</html>
