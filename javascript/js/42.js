// 순서대로 처리 : 동기적인 처리
// 순서 상관없이 동시에 모두 처리 : 비동기적인 처리 (언제 처리 될 지 알수 없음)
// js는 비동기적 처리가 될 수도 있음

//----------------
// 동기 처리
//----------------
// 1. A - B -C 순서로 출력됨
// console.log('A');
// console.log('B');
// console.log('C');


// //----------------
// // 비동기 처리
// //----------------
// // 2. A - C - B 순서로 출력됨
// console.log('A');

// setTimeout(()=> {
//     console.log('B');
// }, 1000);

// console.log('C');

// // 2.의 설명
// function my_setTimeout(callback, ms) {
//     const NOW = new Date();
//     let l1 = new Date();

//     while(l1 - NOW <= ms) {
//         l1 = new Date();
//     }
//     callback();
// }

// my_setTimeout(() => console.log('1'), 1000);
// my_setTimeout(() => console.log('2'), 1000);
// my_setTimeout(() => console.log('3'), 1000);

// C - B - A 순서로 출력
// setTimeout(() => {
//     console.log('A');
// }, 3000);
// setTimeout(() => {
//     console.log('B');
// }, 2000);
// setTimeout(() => {
//     console.log('C');
// }, 1000);


// 콜백지옥
// 시간에 상관없이(비동기 처리임에도 불구하고) 동기적으로 처리하고싶을때 사용
// 비동기처리를 동기적처리로 하기위함.
// 콜백지옥 : 콜백함수를 이용하여 비동기처리를 동기처리하도록 만들 때 나타나는 소스코드의 난잡한 현상
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         },1000);
//     },2000);
// },3000);
