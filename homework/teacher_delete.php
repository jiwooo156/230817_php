<?php
// define("ROOT"(상수명), $_SERVER["DOCUMENT_ROOT"](웹서버 시작 경로)."/mini_board/src/(하위 폴더 경로)"); // 웹서버 root 패스 생성
// define("FILE_HEADER"(상수명), ROOT(=$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/)."header.php"); // 결과 : apache24/htdocs/mini_board/src/header.php
// define("ERROR_MSG_PARAM"(상수명), "Parameter Error : %s"(해당 상수에 대입된 값)); // 파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // apache24/htdocs/mini_board/src/lib/lib_db.php 경로인 파일을 불러오겠다

$arr_err_msg = []; // 에러 메세지 빈 배열로 선언해둠

try {
	
	$conn = null; // PDO 인스턴스 생성한 것 null로 비워둠

	if(!my_db_conn($conn)) {
		// ! db연동하는 함수에 $conn대입(첨엔 null임) : 함수의 값이 false
		throw new Exception("DB Error : PDO Instance");	// exception 인스턴스 생성?  메세지는 "DB Error : PDO Instance"
	}

	$http_method = $_SERVER["REQUEST_METHOD"];	// 요청된 method뭔지 확인 후 해당 값을 변수에 대입. ex) $http_method = Get

	if($http_method === "GET") {
		
		$id = isset($_GET["id"]) ? $_GET["id"] : "";
		// user가 보낸 데이터를 SUPERGLOBAL변수인 $_GET을 통해서 배열로 받아옴. 원하는 정보는 key로 넣어서 값을 찾아봄.
		// user가 보낸 데이터 중 id에 값이 있는지 확인하고 있으면 값을 대입, 없으면 공백으로 대입
		$page = isset($_GET["page"]) ? $_GET["page"] : "";
		// page에 값이 있는지 확인하고 있으면 값을 대입, 없으면 공백으로 대입
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id"); // sprintf(문자열, "대입할 변수") : 문자열에 변수를 대입해주는 함수
			// ERROR_MSG_PARAM : 파일 처음에 선언해놓은 상수. 값은 "Parameter Error : %s"이다. %s는 '문자'를 대입하겠단 뜻
			// $_GET["id"]에 값이 없으면 에러메세지를 $arr_err_msg배열에 대입함. 
			// 왜 배열임? $id,$page에 대한 에러메세지를 같은 변수에 대입하려고 하니까. 한번에 값이 여러개일 수 있으니까 = 배열로 받아야지.
			// 대입된 최종 값은 "Parameter Error : id"
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
			// $_GET["page"]에 값이 없으면 에러메세지 대입. 대입된 값은 "Parameter Error : page"
		}
		if(count($arr_err_msg) >= 1) {
			// $arr_err_msg배열의 원소수를 count해서 1개 이상이면 
			throw new Exception(implode("<br>", $arr_err_msg));		// implode(연결도구, 배열) : 배열의 요소들을 결합해서 문자열로 만들어줌.
			// Execption 인스턴스 생성
			// Parameter Error : %s <br> Parameter Error : %s <br>  ->  Parameter Error : id <br> Parameter Error : page
		}
		
		$arr_param = [
			"id" => $id
		];
		$result = db_select_boards_id($conn, $arr_param);

		// 3-1-3. 예외 처리
		if($result === false) {
			throw new Exception("DB Error : Select id");
		} else if(!(count($result) === 1)) {
			throw new Exception("DB Error : Select id Count");
		}
		$item = $result[0];

	} else {
		// 3-2. POST일 경우 (삭제 페이지의 동의 버튼 클릭)
		// 3-2-1. 파라미터에서 id 획득
		$id = isset($_POST["id"]) ? $_POST["id"] : "";
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

		// 3-2-2. Transaction 시작
		$conn->beginTransaction();

		// 3-2-3. 게시글 정보 삭제
		$arr_param = [
			"id" => $id
		];

		// 3-2-3. 예외 처리
		if(!db_delete_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Delete Boards id");
		}

		$conn->commit(); // commit
		header("Location: /mini_board/src/list.php"); // 리스트 페이지로 이동
		exit; // 처리 종료
	}
} catch(Exception $e) {
	// POST일 경우에만 rollback
	if($http_method === "POST") {
		$conn->rollBack(); // rollback
	}
	// echo $e->getMessage(); // 예외발생 메세지 출력  //v002 del
	header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}"); // v002 add
	exit; // 처리종료
} finally {
	db_destroy_conn($conn); // DB 파기
}

?>







<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>삭제 페이지</title>
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<main class="container">
		<table class="table-striped">
			<caption>
				삭제하면 영구적으로 복구 할 수 없습니다.
				<br>
				정말로 삭제 하시겠습니까?
				<br><br>
			</caption>
			<tr>
				<th class="radius-left">게시글 번호</th>
				<td class="radius-right"><?php echo $item["id"] ?></td>
			</tr>
			<tr>
				<th class="radius-left">작성일</th>
				<td class="radius-right"><?php echo $item["create_at"] ?></td>
			</tr>
			<tr>
				<th class="radius-left">제목</th>
				<td class="radius-right"><?php echo $item["title"] ?></td>
			</tr>
			<tr>
				<th class="radius-left">내용</th>
				<td class="radius-right"><?php echo $item["content"] ?></td>
			</tr>
		</table>

		<section class="button">
			<form action="/mini_board/src/delete.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<button class="button_a" type="submit">동의</button>
				<a class="button_a" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
			</form>
		</section>
	</main>
</body>
</html>