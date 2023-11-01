/* 1. HTTP ( Hypertext Transfer Protocol )란?
 어떻게 Hypertext를 주고 받을 지 규약한 프로토콜로
 클라이언트가 서버에 데이터를 request(요청)을 하고,
 서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.
 Hypertext는 웹사이트에서 이용되는 하이퍼링크나, 리소스, 문서, 이미지 등을 모두 포함합니다.
 통신을 주고 받는데 쓰는 정해진 규칙
 https는 보안이 더 강화추가된


 2. AJAX ( Asynchronous JavaScript And XML )이란?
    ( 모든걸로 다 통신 할 수 있다. (http, json...) )
    웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고,
    서버의 response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
    즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
    대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있습니다.
    // 페이지 이동하지않고 일부분만 갱신


 3. JSON ( JavaScript Object Notation )이란?
    // 데이터를 주고받는 문자열. 규칙이 있음. 자바스크립트 객체처럼 만들어 둔 것
    JavaScript의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
    장점은 다음과 같습니다.
        - 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
        - 가벼운 텍스트를 기반 *****
        - 가독성이 좋음 *****
        - Key와 Value가 짝을 이루고 있음
        - 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1 참조]하기 위해 사용
        - 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

    JSON.stringify( obj ) : Object를 JSON 포맷의 String으로 변환(serializing) 해주는 메소드
    JSON.parse( json ) : JSON 포맷의 String을 Object로 변환(Deserializing) 해주는 메소드



    
// XML
<xml>
    <data>
        <id>56</id>
        <name>홍길동</name>
    </data>
</xml>

// JSON
{
    data: {
        id: 56
        ,name: '홍길동'
    }
}

4. API 예제 사이트
    https://picsum.photos/
*/
 

// const MY_URL = "https://picsum.photos/v2/list?jpage=2&limit=5"
// JS로 img태그 만들고 요소 만들어서 쓰는이유
// 안그러면 html에 이미 요소를 만들어놨어야하는데 언제 얼마나 많은 이미지가 올 줄 알고 미리 만들어놓지?
// 그래서 필요할때 서버와 통신해서 자바스크립트로 만들어 줌
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch );


function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url');
    // input-url의 요소를 가져옴
    fetch(INPUT_URL.value.trim())
    // input-url의 값을 받아올것임 (공백제거하고)
    // resolve를 response에 담아서 씀
    // 옳게 fetch하면 .then으로 넘어감
    .then( response => { 
        if ( response.status >= 200 && response.status < 300 ) {
            // status가 200~300이면 response.json해주고 아니면 에러 뜸(catch로 이동)
            return response.json();
        } else {
            throw new Error('에러에러');
        }
    } )
    // .then( response => console.log(response) )
    // response를 콘솔에 찍었을때
    // status가 200번대 : 정상
    //          300번대 : 서버에서 에러
    //          400번대 : 통신이 안됐을 때
    // 앞의 then에서 올바르게 resolve 받아왔으면 data에 담아줌
    .then( data => makeImg(data))
    // response를 배열로 만들고 그 return값이 data에 들어감.
    .catch( error => console.log(error) );
}


 // makeImg는 foreach돌려주는 함수. 아규먼트는 data. 
function makeImg(data) {
    // 파라미터는 data.
    data.forEach( item => {
        const NEW_IMG = document.createElement('img');
        // img태그를 만들었음
        const DIV_IMG = document.querySelector('#div-img');
        // div-img안에 자식태그가 계속 쌓일 것임
        NEW_IMG.setAttribute('src', item.download_url)
        // item의 요소인 download_url에 접근하겠다
        NEW_IMG.style.width = '200px';
        NEW_IMG.style.height = '200px';
        DIV_IMG.appendChild(NEW_IMG);
        // HTML에 이미지 넣기
    });
}

// '지우기'버튼
const BTN_CLEAR = document.querySelector('#btn-clear');
BTN_CLEAR.addEventListener('click', clearImg);

// '지우기'버튼 눌렀을때 실행될 함수
function clearImg() {
    // DIV_IMG의 자식요소들(img태그들)을 replace해서 하는 법
    // 빈값을 넣었기때문에 빈값으로 대체되어서 img가 삭제되는것
    // removeCild()는 파라미터(node)를 지정해줘야함.
    // replaceChildren은 지정안해주면 그냥 빈값으로 대체함
    const DIV_IMG = document.querySelector('#div-img');
    DIV_IMG.replaceChildren();

    // for문돌려서 img태그 하나하나 삭제해서 하는 법
    // const IMG = document.querySelectorAll('img');
    // for(let i = 0; i < IMG.length; i++){
    //     IMG[i].remove();
    // }

    // DIV_IMG를 공백으로 비워서 안의 요소들(img태그들) 삭제하는 법
    // const DIV_IMG = document.querySelector('#div-img');
    // DIV_IMG.innerHTML = "";
}


// fetch 2번째 아규먼트 셋팅 방법
function infinityLoop() {
    let apiUrl = "http://192.168.0.82:6001/03_insert.php"
    // init으로 객체를 만들어줌
    let init = {
        method: "POST"
        ,body: {
            title: "아아아"
            ,content: "오오옹"
            ,em_id: "2"
        }
    };
    // 만든객체는 fetch에 대입됨
    fetch(apiUrl, init)
    .then( response => console.log(response) )
    .catch( error => console.log(error) );
}