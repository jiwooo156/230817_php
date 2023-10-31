<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105/src/"); // 루트 상수 선언
define("FILE_HEADER",ROOT."header.php");
define("ERROR_MSG_PARAM", "Parameter Error : %s");
require_once(ROOT."lib/lib.php");

$conn = null;
$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화
$arr_err_msg = []; // 에러 메세지 저장용

try {
   if(!my_db_conn($conn)) {
    throw new Exception("DB Error : PDO Instance");
    }; 

	$page = isset($_GET["page"]) ? $_GET["page"] : "1"; 
	if($page === "") {
		$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
	}
	if(count($arr_err_msg) >= 1) {
		throw new Exception(implode("<br>", $arr_err_msg));
	}

	// 총 게시글 수 검색
	$boards_cnt = db_select_boards_cnt($conn);
	if($boards_cnt === false) {
		throw new Exception("DB Error : SELECT Boards Count"); // 강제 예외발생 : SELECT Count
	}

	$max_page_num = ceil($boards_cnt / $list_cnt); // 최대 페이지 수

	$offset = ($page_num - 1) * $list_cnt; // 오프셋 계산

	// 이전버튼
	$prev_page_num = $page_num - 1 > 0 ? $page_num - 1 : 1;

	// 다음버튼
	$next_page_num = $page_num + 1 > $max_page_num ? $max_page_num : $page_num + 1;

	// DB 조회 시 사용할 데이터 배열
	$arr_param = [
		"list_cnt" => $list_cnt
		,"offset" => $offset
	];

	// 게시글 리스트 조회
	$result = db_select_boards_paging($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		var_dump($result);
		throw new Exception("DB Error : Select boards Paging");
}
 } catch(Exception $e) {
    header("Location: /1105/src/list.php");
    exit;
} finally {
    db_destroy_conn($conn); // DB 파기
}




?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105/src/css/common.css">
    <title>리스트페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
	<main class="container">
		<section class="button_i">
			<a class="btn-write" href="/1105/src/insert.php">글 작성</a>
		</section>
		<table class="table-striped">
			<thead>
				<tr>
					<th class="id_num">게시글 번호</th>
					<th>게시글 제목</th>
					<th class="creatat">작성일자</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// 리스트를 생성
					foreach($result as $item) {
				?>
					<tr>
						<!-- 게시글 번호 -->
						<td><?php echo $item["id"]; ?></td>
						<td>
							<!-- 제목 (누르면 detail페이지로 이동) -->
							<a href="/1105/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
								<?php echo $item["title"]; ?>
							</a>
						</td>
						<!-- 생성일자 -->
						<td><?php echo $item["create_at"]; ?></td>
					</tr>
				<?php
					} 
				?>
			</tbody>
		</table>
		<section class="button">
			<a class="btn-prenex" href="/1105/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
			<?php 
				for($i = 1; $i <= $max_page_num; $i++) {
					$str = (int)$page_num === $i ? "bt-b" : "";
			?>
					<!-- 리스트 페이지 번호 출력되고, 누르면 해당 리스트 페이지로 이동 -->
					<a class="btn-prenex <?php echo $str ?>" href="/1105/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			?>
			<a class="btn-prenex" href="/1105/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
		</section>
	</main>
</body>
</html>