// DOM (Document Object Model)이란?
// 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작 가능

// 1. 요소 선택
//  1-1. 고유한 ID로 요소를 선택
// const TITLE = document.getElementById('title');
// TITLE.style.color = 'blue';
// TITLE.style.fontSize = '100px';

// const SUBT = document.getElementById('subtitle');
// SUBT.style.backgroundColor = 'beige';

// //  1-2. 태그명으로 요소를 선택 (해당 요소들을 컬랙션 객체로 가져온다.)
// //  특정 개체에만 효과 주고싶으면 index번호로 지정
// const H2 = document.getElementsByTagName('h2');
// H2[0].style.color = 'red';

// //  1-3. 클래스로 요소를 선택
// const NONE = document.getElementsByClassName('none-li');
// // NONE[5].style.color = 'gray';

// //  1-4. CSS 선택자를 사용해 요소를 찾는 메소드
// //      querySelector() : 복수일 경우 가장 첫번째 요소만 선택
// const S_ID = document.querySelector('#subtitle2');
// const S_NONE = document.querySelector('.none-li');


// //      querySelectorAll() : 복수일 경우 전부 선택
// const S_NONE_ALL = document.querySelectorAll('.none-li');


// // -----------------
// // 2. 요소 조작
// // -----------------

// // INTXTContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
// TITLE.INTXTContent = '<p>탕수육</p>'; // <p>탕수육</p> 그대로 보임.


// // innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
// TITLE.innerHTML = '<p>탕수육</p>'; // 탕수육으로 보임.


// // setAttribute('속성 명','넣고싶은 값') : 요소에 속성을 추가
// const INTXT = document.querySelector('#intxt');
// // const INTXT = document.getElementById('intxt');
// INTXT.setAttribute('placeholder','안녕하세요');
// // ** 몇몇 속성들은 DOM 객체에서 바로 설정 가능
// // ex) INTXT.placeholder = '바로 접근 가능';

// // removeAttribute('') : 요소의 속성을 제거
// INTXT.removeAttribute('placeholder');


// -----------------
// 3. 요소 스타일링
// -----------------

// style : 인라인으로 스타일 추가
// ex) TITLE.style.color = 'red';

// classList : 클래스로 추가 또는 삭제
// ex) TITLE.classList.add('class1', 'class2', 'class3'); // TITLE의 class에 접근, class를 추가함.
// ex) TITLE.classList.remove('class2'); // TITLE의 class에 접근, class를 삭제함.



// -------------------
// 4. 새로운 요소 생성
// -------------------

// 요소 만들기
const LI = document.createElement('li'); // li태그 만들기 (여러개 넣고싶으면 여러개 만들어야됨)
const LI2 = document.createElement('li');
LI.innerHTML = "글글글"; // 새로운 li에 글 넣어줌
LI2.innerHTML = "글글글2";

// 삽입할 부모 요소 접근
const UL = document.querySelector('#ul'); // ul태그 id로 접근하기

// 부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI); // ul에 새로 만들어 둔 li 삽입
UL.appendChild(LI2);

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('ul li:nth-child(3)');
UL.insertBefore(LI, SPACE);


// 
LI2.remove;


// 1. 사과게임 위에 장기를 넣어주세요.
const LI3 = document.createElement('li'); // 새로운 li 생성
LI3.innerHTML = "장기"; // 생성한 li에 값 넣어줌

const SPACE2 = document.querySelector('ul li:nth-child(5)'); // 기준점 정함
UL.insertBefore(LI3, SPACE2); // insertBefore(넣을값, 기준점)



// 2. 어메이징브릭에 베이지 배경색을 넣어주세요.
const SPACE3 = document.getElementById('brick'); // 효과넣을 li 정함 (id 정해서 주면 더 정확함)
// const SPACE3 = document.querySelector('ul li:last-child');로 줘도 됨. (어차피 마지막에 넣을거니까)
SPACE3.style.backgroundColor = 'beige'; // 효과 줌



// 3. 리스트에서 짝수는 빨간색글씨, 홀수는 파랑색글씨로 만들어 주세요.
const ULIST = document.querySelectorAll('ul li'); // 리스트 전체에 영향 줄거임

for(let i=0; i < ULIST.length; i++) {
    // 리스트를 전체적으로 돌려야됨
    // 조건에 let으로 선언해두면 for문 안에서만 적용됨
    if(i % 2 === 0){
        // i는 리스트의 index번호이기때문에 0부터 시작, 2로 나눴을때 0이되면 홀수임.
        // 리스트의 홀수요소에 효과 줌
        ULIST[i].style.color = 'blue';
    } else if(i % 2 === 1) {
        // 리스트의 짝수요소에 효과 줌
        ULIST[i].style.color = 'red';
    } 
    // if문 작성안하고 한번에 조건 주는 법
    // ULIST[i].style.color = i % 2 === 0 ? 'blue' : 'red';
}


// const test1 = document.querySelectorAll('ul li:nth-child(even)'); // 짝수번 리스트만 가져오는 법
// const test2 = document.querySelectorAll('ul li:nth-child(odd)'); // 홀수번 리스트만 가져오는 법