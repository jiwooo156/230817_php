// 함수

// 함수 생성

// ------------------------------
// 함수 선언식 : 호이스팅의 영향을 받는다.
// ------------------------------
function fnc_sum(a, b) {
    return a + b;
}




// ------------------------------
// 함수 표현식 : 호이스팅의 영향을 받지 않는다.
// ------------------------------
// 익명 함수 (function옆에 함수명 기입하지 않음)
let fnc1 = function(a, b) {
    return a + b;
}
// fnc1(3, 4); 이런 형식으로 함수를 호출할 수 있음




// ------------------------------
// 익명함수 : 이름이 없는 함수 (어딘가에 담아주거나 callback함수?)
// ------------------------------




// ------------------------------
// 콜백함수 : 다시 호출되는 함수
// ------------------------------
function fnc_callback( call ) {
    call();
}

fnc_callback(function() {
    console.log('익명함수');
});


// 배열객체의 sort의 경우 예시(**동작은 안함**)
// sort_arr.sort( function(a, b) {
//     return a - b
// });

// function sort(call) {
//     let num = call();
//     // 함수 호출하고 사용
//     if(num <0) {
//         // 처리
//     } else {
//         // 종료
//     }
// }

//Function 생성자 함수 (함수가 객체기 때문에 나타나는 )
// let tt = Function('a', 'b', 'return a + b;');

// 화살표 함수 (Arrow Function)
// 파라미터가 없는 경우
let f1 = function() {
    return "f1";
}

let f2 = () => "f2";

// 파라미터가 1개인 경우 (소괄호 생략 가능)
let f3 = function(a) {
    return a + '입니다';
}

let f4 = a => a + '입니다';

// 파라미터가 2개 이상인 경우 (소괄호 생략 불가능)
let f5 = function(a, b) {
    return a + b;
}

let f6 = (a, b) => a + b;

// 함수의 처리가 많을 경우 (중괄호 안에 작성해줌)
let f7 = function(a, b) {
    if(a > b) {
        return 'a가 큼';
    } else {
        return 'b가 큼';
    }
}

let f8 = (a, b) => {
    if(a > b) {
        return 'a가 큼';
    } else {
        return 'b가 큼';
    }
}