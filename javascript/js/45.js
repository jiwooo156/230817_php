// 1. promise 객체
//  - 비동기 프로그래밍의 근간이 되는 기법 중 하나
//  - 프로미스를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어가능
//  - Promise 객체는 비동기 작업의 최종 완료 또는 시퓨ㅐ를 나타내는 독자적인 객체


// 2. Promise 사용법

const PROMISE1 = new Promise( function(resolve, reject) {
    let flg = true;
    if(flg) {
        return resolve('성공'); // 요청 성공 시 resolve()를 호출
    } else {
        return reject('실패'); // 요청 실패 시 reject()를 호출
    }
});

PROMISE1
.then(date => console.log(date)) // 성공 했을 때 실행
.catch(err => console.log(err)) // 실패 했을 때 실행
.finally(() => console.log('finall 입니다')); // 무조건 실행


// 3. Promise 함수 등록 : promise객체를 함수로 만들어줌 
// 재사용성, 가독성, 확장성을 이유로 현업에서는 아래와 같이 함수를 등록하고 사용
function PRO2() {
    return new Promise( function(resolve, reject) {
        let flg = true;
        if(flg) {
            return resolve('성공'); // 요청 성공 시 resolve()를 호출
        } else {
            return reject('실패'); // 요청 실패 시 reject()를 호출
        }
    });
}




// PROMISE1
// .then(() => setTimeout(() => {console.log('A')}, 3000))

// const PRO2 = function(ms) {
//     return new Promise((resolve) => {
//         setTimeout(() => resolve(ms), ms);
//     })
// }

// PRO2(1000)
// .then(date => {
//     console.log('A');
//     PRO2
//     .then()
// })

function PRO3(str, ms) {
    // str과 ms를 파라미터로 받음
    return new Promise(function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

PRO3('A', 3000)
// PRO3돌려서 resolve 뜨면 then 실행시킴
.then(() => PRO3('B', 2000))
.then(() => PRO3('C', 1000));
// then은 순서대로 실행


PRO3('A', 3000)
// PRO3돌려서 resolve 뜨면 then 실행시킴
.then(() => { 
    PRO3('B', 2000)
    .then( () => PRO3('C', 1000))
})