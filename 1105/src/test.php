<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105/src/css/common.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <main>
        <table>
            <tr>
                <td><?php echo $item["id"]; ?></td>
                <td><?php echo $item["title"]; ?></td>
                <td><?php echo $item["create_at"]; ?></td>
            </tr>
        </table>
        <section>
            <a href="">수정</a>
            <a href="">삭제</a>
            <a href="">취소</a>
        </section>
    </main>
</body>
</html>