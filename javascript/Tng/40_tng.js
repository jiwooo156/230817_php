// 1. 버튼 클릭 시 alert
const BTN = document.getElementById('btn1');
BTN.addEventListener('click', () => {
    alert('안녕하세요. \n숨어있는 div를 찾아보세요.');
});


// 2-1. 특정 영역에 마우스 올라가면 alert 

const DIV1 = document.getElementById('div1');
function heart() {
    alert('두근두근');
};

DIV1.addEventListener('mouseenter', heart);



// 2-2. 들킨상태에서 alert 안뜸


// 3. 2번 영역 클릭하면 alert, backgroundColor = 'beige';
function click2() {
    alert('들켰다!');
    DIV1.style.backgroundColor = 'beige'; 
    DIV1.removeEventListener('click', click2);
    DIV1.addEventListener('click', click3);
    DIV1.removeEventListener('mouseenter', heart);
};

DIV1.addEventListener('click', click2);


// 4. 3번에서 다시 클릭하면 alert, backgroundColor = 'white';
// DIV1.removeEventListener('click', click2);
function click3() {
    DIV1.removeEventListener('click', click2);
    alert('다시 숨는다!');
    DIV1.style.backgroundColor = 'blue'; 
};











