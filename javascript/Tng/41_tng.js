// 1. 현재 시간을 화면에 표시


// // 2. 실시간으로 시간을 화면에 표시

function ntime() {
    // 시간 구하기
    const NOW = new Date();
    let hours = NOW.getHours(); 
    let minutes = NOW.getMinutes();
    let seconds = NOW.getSeconds(); 
    let nhour = hours - 12; // -시간이 뜸......
    const DIV1 = document.querySelector('#div1');
    DIV1.innerHTML = '현재 시간 ' + nhour + '시 ' + minutes + '분 ' + seconds + '초'; // 실시간 화면에 출력
    DIV1.style.fontSize = '100px'
};


// // 함수를 적용한 setInterval 1초마다 갱신
// setInterval(ntime, 1000);


// // 3. 멈춰 버튼을 누르면, 시간이 정지할 것
let tm_stop = setInterval(ntime, 1000);

const BTNST = document.querySelector('#btn-stop');

function stoptm() {
    clearInterval(tm_stop);
}

BTNST.addEventListener('click', stoptm);



// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시 
const BTNRS = document.querySelector('#btn-restart');

function restarttm() {
    tm_stop = setInterval(ntime, 1000);
}

BTNRS.addEventListener('click', restarttm);








//-------------
// 선생님
//-------------

// 1. 실시간 화면 표시

// const PRINTTIME = document.getElementById('clock');

// getNow();
// let interval; 
// startTime();

// function getNow() {
//     const NOW = new Date();
//     const NOWUSA = new Date(); // 미국시간 구할 Date
//     let hours_24 = NOW.getHours(); 
//     let minutes = NOW.getMinutes();
//     let seconds = NOW.getSeconds(); 

//     // 12보다 작으면 오전붙이고 크면 오후 붙이려고
//     let AMPM = hours_24 > 12 ? '오후' : '오전';

//     let hours_12 = hours_24 > 12 ? hours_24 - 12 : hours_24;
//     let print_time = 
//         AMPM + ' '
//         + add_str_zero(hours_12) + ':'
//         + add_str_zero(minutes) + ':'
//         + add_str_zero(seconds);

//     NOWUSA.setTime(NOW - (1000 * 60 * 60 * 13)); // 현재시간 - 13시
//     let now_usa = NOWUSA.toLocaleTimeString();

//     PRINTTIME.innerHTML = print_time + '<br>' + '미국 시간은 ' + now_usa;
//     // HTML 구문이라서 계행 <br>로 준 거임.
// }

// // 10보다 작은 경우 0을 붙여서 표시하려고 ex) 05시
// function add_str_zero(num) {
//     return String(num < 10 ? '0' + num : num);
//     // 앞에 String붙여서 강제로 형변환 해줌.
// };



// // 3. 멈춰버튼 : 시간 정지
// const BTNSTOP = document.querySelector('#btn-stop');
// BTNSTOP.addEventListener('click',stoptime);

// function stoptime() {
//     clearInterval(interval);
// }



// // 4. 재시작버튼 : 누른 시점부터 다시 시작
// const BTNRESTART = document.querySelector('#btn-restart');
// BTNRESTART.addEventListener('click', startTime);

// function startTime() {
//     interval = setInterval(getNow, 1000);
// }
