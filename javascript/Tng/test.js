// 두수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.

// function mySum(a, b) {
//     return a + b;
// }

// console.log(mySum(2,5));
// mySum(2,5);

// // 익명함수는 어딘가에 저장할 공간이 있어야함 그래서 익명으로 하려니까 오류나는거
// const sum1 = function mySum(a, b) {
//     return a + b;
// }

// // 콜백함수
// function test() {
//     console.log('A');
//     mySum(2,5); 
// }

// // 함수를 나중에 실행시키기 위해서 파라미터에 함수를 넣어준다.
// function myCallBack(fnc) {
//     fnc();
// }
// myCallBack(function() {
//     console.log('123');
// });
// myCallBack( () => console.log('123') );

// [1,2,3].filter(function(num){ 
//     return num === 3;
// });

// function myPrint(){
//     console.log('123');
// }
// setTimeout( myPrint, 1000 );


// 함수를 3개 만들어주세요.
// 1. php를 출력하는 함수( 3초 뒤 출력 )
// function php1() {
//     console.log('php');
// }
// setTimeout(php1, 3000);
// // 2. 504를 출력하는 함수( 5초 뒤 출력 )
// function green() {
//     console.log('504');
// }
// setTimeout(()=>console.log('504'), 5000);

// // 3. 풀스택을 출력하는 함수( 바로 출력 )
// function one(){ 
//     console.log('풀스택');
// }
// one();

// 현재 시간 구해주세요.
// yyyy-mm-dd hh:mm:ss
// const NOW = new Date();
// let hours_24 = NOW.getHours();
// let minutes = NOW.getMinutes();
// let seconds = NOW.getSeconds();
// let year = NOW.getFullYear();
// let month = NOW.getMonth() + 1;
// let date = NOW.getDate();

// let hours_12 = hours_24 > 12 ? hours_24 - 12 : hours_24;
// let print_time = 
//         + add_str_zero(hours_12) + ':'
//         + add_str_zero(minutes) + ':'
//         + add_str_zero(seconds);
// function add_str_zero(num) {
//     return String(num < 10 ? '0' + num : num);
// };
// const PRINTTIME = document.getElementById('clock');
// PRINTTIME.innerHTML = print_time + '<br>' + '미국 시간은 ' + now_usa;
// console.log(year+"-"+month+"-"+date+"-"+" "+hours_12+":"+minutes+":"+seconds);


// 현재 시간 (선생님ver)
const TO_DAY = new Date();

let year = TO_DAY.getFullYear();
let month = TO_DAY.getMonth() + 1;
let date = TO_DAY.getDate();
let hours = TO_DAY.getHours();
let minutes = TO_DAY.getMinutes();
let seconds = TO_DAY.getSeconds();

const FORMAT_TODAY = year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;
// 콘솔에서 FORMAT_TODAY찍어보면 나옴
// +로 문자열 연결하다보면 숫자가 포함됐을때 더하기로 인식될수도있음. 조심해야됨.
document.write(FORMAT_TODAY)
// write 메소드 사용하면 HTML에 div 안 잡아줘도 바로 출력할 수 있음.


// 버튼 만들기
// 버튼 클릭 시 네이버로 이동
const BTN_NAVER = document.getElementById('btn_naver')
BTN_NAVER.onclick = function() {
    location.href = 'http:\/\/www.naver.com';
}

// 팝업창
const BTNNAV = document.getElementById('btn_nav')
function popOpen() {
    winOpen = open('http:\/\/www.naver.com','','width=500 height=500');
};
BTNNAV.addEventListener('click', popOpen);

// onclick
// html구문의 button에 onclick 주면 됨.

// 그냥 바로
function naver1(){
    location.href = 'http:\/\/www.naver.com';
}
const BTNNAV2 = document.getElementById('btn_nav2')
BTNNAV2.addEventListener('click',naver1);




