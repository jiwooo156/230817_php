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