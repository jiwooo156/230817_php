// console.log("반갑습니다. js파일입니다.");


// -----------------
// 변수 (let, let, const)
// -----------------

// let : 중복 선언 가능, 재할당 가능, 함수레벨 스코프(동작 방식)
// let u_name = "홍길동";
// console.log(u_name);
// let u_name = "갑순이"; // 중복 선언
// console.log(u_name);
// 기존에 name에 선언한게 사라지고 뒤에꺼가 덮어씌어짐. = 중복 선언 가능
// 지시자는 똑같고 값만 바꿀경우, 지시자 생략 가능. = 재할당 가능

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프(동작 방식)
// 의도하지 않게 변수명 중복되는거 막기위해서 let이 나옴. 그래서 주로 let보다 let을 사용함. (db의 제약조건(pk)와 비슷한 개념)
// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이"; // 중복 선언 안돼서 앞에 let 지시자 못 붙임.
// console.log(u_name); // 값은 갑순이.

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프(동작 방식)
// 상수와 비슷함
const AGE = 19;
AGE = 20; // 재할당 불가능
console.log(AGE); // AGE = 20; 때문에 에러남. (에러나면 여기 밑으로는 처리 안됨.) (에러나는지는 html의 콘솔에서 확인가능.)

// ---------------
// 스코프
// ---------------

// 전역 스코프
let gender = "M";

// 함수 레벨 스코프
// 함수 내에서만 동작하는
// 블록보다 넓은 개념
function test() {
    let test1 = "test1";
    if(true) {
       let test1 = "test2";
       test1 = "test3";
       console.log(test1);
       console.log(gender);
    }
    console.log(test1);
}

// 블록 레벨 스코프
// 블록 내에서만 동작하는
// {} : 블록
function test2() {
    let t = "test1";
    if(true) {
        let t = "test2";
    }
    console.log(t);
}
function test3() {
    let t = "test1";
    if(true) {
        let t = "test2";
    }
    console.log(t);
}

// ---------------
// 호이스팅 (hoisting)
// ---------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// (인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

// console.log(htest1());
// console.log(hvar);
console.log(hlet);


function htest1() {
    return "htest1 함수입니다.";
}

var hvar = "var로 선언";
// var로 선언한 애는 호이스팅 됨
let hlet = "let으로 선언";
// let으로 선언한 애는 호이스팅 안됨

console.log(hlet);