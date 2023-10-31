// URL = "https://picsum.photos/v2/list?jpage=2&limit=5"



// 사진 삽입하는 버튼
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch );

function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url');
    fetch(INPUT_URL.value.trim())
    .then( response => { 
        if ( response.status >= 200 && response.status < 300 ) {
            return response.json();
        } else {
            throw new Error('에러에러');
        }
    } )
    .then( data => makeImg(data))
    .catch( error => console.log(error) );
}
function makeImg(data) {
    data.forEach( item => {
        const NEW_DIV = document.createElement('div');
        const NEW_IMG = document.createElement('img');
        const NEW_ID = document.createElement('div');
        const DIV_IMG = document.querySelector('#div-img');
        NEW_ID.innerHTML = item.id
        NEW_DIV.setAttribute('class', 'div2')
        NEW_IMG.setAttribute('src', item.download_url)
        // item의 요소인 download_url에 접근하겠다
        NEW_IMG.style.width = '90%';
        NEW_DIV.appendChild(NEW_ID);
        NEW_DIV.appendChild(NEW_IMG);
        DIV_IMG.appendChild(NEW_DIV);
    });
}



// 지우는 버튼
const BTN_CLEAR = document.querySelector('#btn-clear');
BTN_CLEAR.addEventListener('click', clearImg);

function clearImg() {
    const DIV_IMG = document.querySelector('#div-img');
    DIV_IMG.replaceChildren();
}

