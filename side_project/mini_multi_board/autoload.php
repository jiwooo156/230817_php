<?php

spl_autoload_register( function($path) {
    $path = str_replace("\\", "/", $path);
    // $path로 받아온 경로에 \를 /로 바꾸겠다. 그리고 그 바꾼 경로를 다시 $path에 담아줌.
    // 자동으로 내가 사용할 파일을 가져옴?
    require_once($path._EXTENSION_PHP);
});









