// 인라인 이벤트
// html파일 9 ~ 10라인 확인


// 프로퍼티 리스너 방식
// 하나의 객체에 하나의 이벤트만 줄 수 있음
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
    location.href = 'http:\/\/www.google.com';
}

//--------------
// 팝업창 열기
//--------------
// addEventListener(eventType, function) 방식
// 하나의 객체에 여러가지 이벤트를 줄 수 있음
const BTNDAUM = document.getElementById('btn_daum'); 

let winOpen; // 전역변수로 설정 (블록레벨로 설정하면 안됨)

BTNDAUM.addEventListener('click', popOpen);
// addEventListener()이 함수 안에 popOpen함수만 넣어야지 실행시키면 안됨.
// 함수를 실행시킨다 : 함수명()
// 안에있는 함수(콜백 함수)를 실행시키려고 하는건데, 
// 파라미터에서 실행시켜버리면 콜백 함수가 실행되는게 아니고 실행 된 값을 실행하려 하니까 에러가 남



//--------------
// 팝업창 닫기
//--------------
const BTNCLOSE = document.getElementById('btn_close');

BTNCLOSE.addEventListener('click', popClose);
// 여기서 접근하게 하려고 winOpen을 전역변수로 설정한것



//--------------
// 이벤트 삭제
//--------------
// BTNDAUM.removeEventListener('click', popOpen);


function popOpen() {
    winOpen = open('http:\/\/www.daum.net','','width=500 height=500');
    // open('이동할 주소', '디폴트 = 새창/ _self = 기존 창', '창의 크기');
};

// // 'test'를 콘솔에 출력하는 함수
// function test() {
//     console.log("test");
// }

// // 콜백함수를 실행하는 함수
// function cb(fnc) {
//     fnc();
// }


function popClose() {
    winOpen.close();
};

// BTNCLOSE.addEventListener('click', popClose); 이 event를 remove하려면
BTNCLOSE.removeEventListener('click', popClose); // 다 똑같은데 메소드명만 다름.



//--------------
// 마우스 이벤트
//--------------

// Mouseenter
const DIV1 = document.querySelector('#div1');
// div1에 마우스 올리면 경고 띄우고 배경색 바꾸기.
DIV1.addEventListener('mouseenter',() => { 
    alert('DIV1에 들어왔어요.');
    DIV1.style.backgroundColor = 'black';
});



