<?php

$i = 1;
while( $i <= 9 ){
    echo "{$i}단\n";
    for($dan = 1; $dan <= 9; $dan++){
        $mul = $i*$dan;
        echo "{$i} X {$dan} = {$mul}\n";
    }
    $i++;
}



?>