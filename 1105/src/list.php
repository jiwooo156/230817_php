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

	$page_num = isset($_GET["page"]) ? $_GET["page"] : "1"; 
	if($page_num === "") {
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/1105/src/css/common.css">
    <title>Document</title>
</head>
<body>
    <!-- header 참조 -->
    <?php
        require_once(FILE_HEADER);
    ?>
    <!-- list 전체 영역 -->
    <main class="list_main">

        <table>
			<colgroup>
			<col width="20%" />
			<col width="50%" />
			<col width="30%" />
			</colgroup>
            <?php
                // 리스트를 생성
                foreach($result as $item) {
            ?>
                <tr>
                    <!-- 글 번호 -->
                    <td class="list_list"><?php echo $item["id"]; ?></td>
                    <!-- 제목 : 누르면 detail 페이지로 이동 -->
                    <td class="list_list">
                        <a class="title_a" href="/1105/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
                                        <?php echo $item["title"]; ?>
                        </a>
                    </td>
                    <!-- 작성일자 -->
                    <td class="list_list"><?php echo $item["create_at"]; ?></td>
                </tr>
            <?php
                } 
            ?>    
        </table>
        <!-- btn_page : 페이지 버튼 전체 -->
        <section class="btn_page">
            <a class="btn-prenex" href="/1105/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>

			<?php 
				for($i = 1; $i <= $max_page_num; $i++) {
					$str = (int)$page_num === $i ? "bt-b" : "";
			?>
					<!-- 리스트 페이지 번호 출력되고, 누르면 해당 리스트 페이지로 이동 -->
					<!-- echo $str : 눌린 페이지 버튼 색 변화 줌 like 호버 -->
					<a class="btn-prenex <?php echo $str ?>" href="/1105/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			?>

			<a class="btn-prenex" href="/1105/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>   
        </section>

		<!-- 글작성 버튼 -->
        <section>
            <a class="btn-write" href="/1105/src/insert.php">글 작성</a>
        </section>
    </main>
</body>
</html>