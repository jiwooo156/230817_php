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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105/src/css/common.css">
    <title>작성페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?> 

    <main>
        <?php
        foreach($arr_err_msg as $val) {
        ?>
            <p><?php echo $val ?></p>
        <?php
            }
        ?>  

        <form action="/1105/src/insert.php" method="post">
			<div class="form_box">
                <div class="input_area">
                    <label class="input_head" for="head">제목</label>
                    <input class="input_text" type="text" id="head" value="<?php echo $title ?>">
                </div>
                <div>
                    <textarea class="inserdate" id="inserdate" cols="30" rows="10" placeholder="오늘의 기분은 어떠셨나요? &#10; 가만히 떠올려 봅시다"></textarea>
                </div>
				<section >
					<button class="com_b" type="submit">작성</button>
					<a class="com_a" href="/1105/src/list.php">취소</a>
				</section>
			</div>
        </form>

    </main>
</body>
</html>