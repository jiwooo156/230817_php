// -------------
// 기본 데이터 타입
// -------------

// 숫자(number)
let num = 1;

// 문자열(srting)
let str = "string";

// 불리언(boolean)
let boo = true;

// null
let nu = null;

// undefined
// 변수를 선언만 하고 할당하지 않은 상태
let und;

// symbol : 고유한 ID를 가진 데이터 타입
let symbol_3 = Symbol("symbol");
let symbol_4 = Symbol("symbol");
// (symbol_1 === symbol_2) = false
// (symbol_1 == symbol_2) = false
// 값 상관없이 둘은 다른 애임.

let symbol_1 = "symbol";
let symbol_2 = "symbol";
// (symbol_1 === symbol_2) = true


// 객체 타입
// Object
let obj = {
    food1: "탕수육"
    ,food2: "짜장면"
    ,food3: "라조기"
    ,eat: function() {
        console.log("먹자");
    }
    ,list: {
        list1: "리스트1"
        ,list2: "리스트2"
    }
}
// 

// Array 
let arr = [1, 2, 3];

// Date
// Math
// Object
// 그 외에 기본데이터 타입을 제외한 모든 것 = 객체 타입

// 자기자신의 회원정보를 객체로 만들어 보세요
let info = {
    name: 'jiwoo'
    ,age: '27'
    ,gender: 'F'
    ,hobby: function() {
        console.log("먹자");
    }
    ,movie: {
        first: '인셉션'
        ,second: '인터스텔라'
        ,third: '캐치미이프유캔'
    }
}