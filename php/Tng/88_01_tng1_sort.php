<?php


// 버블 정렬

// $tmp = $arr[0];
// $arr[0] = $arr[1];
// $arr[1] = $tmp;

// print_r($arr);

// function bubblesort($arr){

// }


    $arr = [5, 34, 3, 2, 6, 7, 12];
    $len = count($arr);

    for ($cnt = 0; $cnt < $len; $i++) 
    {
        for ($idx = 0; $idx < $len - 1 - $cnt; $idx++) 
        {
            if ($arr[$idx] > $arr[$idx + 1]) 
            {
                $tmp = $arr[$idx];
                $arr[$idx] = $arr[$idx + 1];
                $arr[$idx + 1] = $tmp;
            }
        }
    }

print_r ($arr);




















// asort($arr);

// print_r($arr);

// $arr2 = [3, 2, 1];

// $tmp = $arr2[0];
// $arr2[0] = $arr2[1];
// $arr2[1] = $tmp;


// print_r($arr2);
?>