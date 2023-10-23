// console.log("반갑습니다. js파일입니다.");


// -----------------
// 변수 (var, let, const)
// -----------------

// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이"; // 중복 선언
// console.log(u_name);
// 기존에 name에 선언한게 사라지고 뒤에꺼가 덮어씌어짐. = 중복 선언 가능
// 지시자는 똑같고 값만 바꿀경우, 지시자 생략 가능. = 재할당 가능

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// 의도하지 않게 변수명 중복되는거 막기위해서 let이 나옴. 그래서 주로 var보다 let을 사용함. (db의 제약조건(pk)와 비슷한 개념)
// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이"; // 중복 선언 안돼서 앞에 let 지시자 못 붙임.
// console.log(u_name); // 값은 갑순이.

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
// 상수와 비슷함
const AGE = 19;
AGE = 20; // 재할당 불가능
console.log(AGE); // AGE = 20; 때문에 에러남. (에러나면 여기 밑으로는 처리 안됨.) (에러나는지는 html의 콘솔에서 확인가능.)

