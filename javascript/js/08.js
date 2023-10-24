// -----------------
// 조건문 ( if, switch )
// -----------------
// if(조건) {

// } else if(조건) {

// } else {

// }

// switch(검증할값) {
//     case 비교값1:
//         // 처리
//         break;
//     case 비교값2:
//         // 처리
//         break;  
//     default:
//         // 처리
//         break;  
// }   

// let age = 30;
// switch(age) {
//     case 20:
//         console.log("20대");
//         break;
//     case 30:
//         console.log("30대");
//         break;  
//     default:
//         console.log("모르겠다");
//         break;   
// }



// -------------------------------------------------------------
// 반복문 ( while, do_while, for, foreach, for...in, for...of )
// -------------------------------------------------------------

// foreach : 배열만 사용가능 (배열 객체의 메소드) (array객체만 반복 돌릴 수 있음)
// let arr = [1, 2, 3, 4]; // 배열

// arr.forEach( function(val, key){
//     console.log(`${key} : ${val}`);
//     // ``안에 넣으면 한꺼번에 문자열로 인식함
//     console.log(key + ' : ' + val);
//     // 이렇게 입력해도 됨
// });

// for...in : 모든 객체를 루프 가능, key에만 접근이 가능함 (key만 알 수 있음)
let obj = {
    key1: 'val1'
    ,key2: 'val2'
}

for( let key in obj ) {
    console.log(obj[key]);
}

// for...of : 모든 iterable 객체(순서가 정해져 있는 객체)를 루프 가능, value에 접근 가능 (String, Array, Map, Set, TypeArray..)
// for( let val of obj ) {
//     console.log(val);
// }



// 정렬해주세요.

let sort_arr = [3, 5, 2, 7, 10];
let sort_a = sort_arr.sort(function(a, b) {
  return a - b;
});
console.log(sort_a);

let sort_arr2 = [3, 10, 5, 2];
sort_arr2.sort((a, b) => a - b);
// a,b는 파라미터. a - b는 파라미터가 해야 할 동작



for( let i = 0; i < sort_arr.length; i++ ){
    for( let z = 0; z < sort_arr.length - i - 1; z++ ) {
        if(sort_arr[z] > sort_arr[z+1]) {
            let tamp = sort_arr[z];
            sort_arr[z] = sort_arr[z+1];
            sort_arr[z+1] = tamp;
        }
    }
}
console.log(sort_arr);