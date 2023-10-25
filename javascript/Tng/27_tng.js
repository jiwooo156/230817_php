// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
    // 전역변수로 선언한 애는 함수에서 사용하면 안됨.

let i_sort = Array.from(ARR1);
// i_sort = Array.from(ARR1).sort( (a, b) => a - b ); // 이렇게 변수에 넣고 바로 만들수도있음
// i_sort.sort((a,b) => a - b);
i_sort.sort(function(a, b) {
    return a - b;
}); 


// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요. (다하면 함수로도 만들어보세요.)
const ARR2 = [5, 7, 3, 4, 5, 1, 2];
let test1 = ARR2.filter( num => num % 2 === 1 ); // 홀수
let test2 = ARR2.filter( num => num % 2 === 0 ); // 짝수

function test_1( arr, flg ) {
    if( flg === 0 ) {
        return arr.filter( num => num % 2 === 0 );
    } else {
        return arr.filter( num => num % 2 === 1 );
    }
}


// 다음 문자열에서 구분문자를 '.'에서 ' '(공백)으로 변경해 주세요. (구글 검색 활용 추천)
const STR1 = 'php504.meer.kat';
// let str_test = STR1.replaceAll('.', ' ');

let test3 = STR1.split('.').join(' ');