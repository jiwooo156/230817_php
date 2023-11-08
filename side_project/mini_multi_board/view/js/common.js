// const BTN_DETAIL = document.querySelector('#btnDetail');
// BTN_DETAIL.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.remove('displayNone');
//     // MODAL.className = '';
// });

// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');

// BTN_MODAL_CLOSE.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.add('displayNone');
// });

let test;

// 상세 모달 제어
function openDetail(id) {
    const URL = '/board/detail?id='+id;
    
    fetch(URL)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // 요소에 데이터 세팅
        const TITLE = document.querySelector("#b_title");
        const CONTENT = document.querySelector("#b_content");
        const IMG = document.querySelector("#b_img");
        const CREATE = document.querySelector("#create_at");
        const UPDATE = document.querySelector("#update_at");

        TITLE.innerHTML = data.data.b_title;
        CREATE.innerHTML = "작성일자: "+data.data.create_at;
        UPDATE.innerHTML = "수정일자: "+data.data.update_at;
        CONTENT.innerHTML = data.data.b_content;
        IMG.setAttribute('src', data.data.b_img);


        // 모달 오픈
        openModal();
    })
    .catch(error => console.log(error))
}

// 모달 오픈 함수 (모달관련 설정들 해줌)
function openModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.add('show');
    MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

// 모달 닫기 함수 (줬던 설정들 없애거나 안보이게)
function closeDetailModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.remove('show');
    MODAL.style = 'display: none;';
}

// 아이디 체크 함수
function idChk() {
    const U_ID = document.querySelector("#u_id").value; // input에 입력된 id 불러옴
    // const URL = '/user/regist?u_id='+u_id;
    const URL = '/user/idchk';   // 서버에 접속할 url (login, regist가 아니니까 새로 만들어줌. url 소문자여야함)
    const ID_CHK_MSG = document.getElementById('idChkMsg');
    ID_CHK_MSG.innerHTML = ""; // 초기화 (기존에 존재 할 수도 있는 메세지 비우기)

    const formData = new FormData();
    formData.append("u_id", U_ID);  // 유저가 입력한 아이디 폼에 셋팅

    const HEADER = {
        method: "POST"
        ,body: formData
    };

    fetch(URL, HEADER)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if(data.errflg === "0") {
            ID_CHK_MSG.innerHTML = "사용 가능한 아이디입니다."
            ID_CHK_MSG.style.classList = 'text-success';
        } else {
            ID_CHK_MSG.innerHTML = "사용할 수 없는 아이디입니다."   // 중복, validation 모두 거쳤기때문에 "중복된" 말고 "사용불가"로 나타냄
            ID_CHK_MSG.style.classList = 'text-danger';
        }
    })
    .catch(error => console.log(error));
}