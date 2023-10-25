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


// // setAttribute('','') : 요소에 속성을 추가
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
// ex) TITLE.classList.add('class1', 'class2', 'class3');
// ex) TITLE.classList.remove('class2');