Math.ceil(3.5); // 올림
Math.round(3.5); // 반올림
Math.floor(3.5); // 버림


// random() : 0이상 1미만의 랜덤한 수를 리턴(소수가 나옴)
Math.ceil((Math.random() * 10)); // 1 ~ 10 사이의 랜덤한 수를 리턴

// 루프 100만번 돌리는데 얼마나 걸리나
colsole.log('루프시작');
for(let i = 0; i < 1000000; i++) {
    let ran = Math.ceil((Math.random() * 10));
    if( ran < 1 || ran > 10 ) {
        console.log('이상한 숫자');
    }
}
console.log('루프끝');


// min(), max() : 파라미터 중 가장 작은 값, 가장 큰 값을 리턴
let arr = [1,2,3,4];
Math.min(...arr); // 아규먼트에 ...빼고 배열만 주면 인식못함.
Math.max(1,2,3,4,5,6); // 아규먼트에 걍 바로 대입해줘도됨.