// AJAX

// JSON

function getItem() {
	// 데이터를 json형태로 가져옴
	fetch('http://localhost:8000/api/item')	// 데이터를 가져올 서버
	// 우리가 쓸 형태로 바꿔줌
	.then(response => response.json())
	// data에 담아줌
	.then(data => {
		let content = data.data[0].content;
		let cp = document.createElement('p');
		cp.innerHTML = content;
		document.body.appendChild(cp);
	})
	// 예외 일 경우
	.catch(error => console.log(error));
}


// 게시글 작성
function addItem() {
	fetch('http://localhost:8000/api/item', {
		method: 'POST',
		headers: {
			"Content-Type": "application/json"
		},
		body: JSON.stringify({
			"data": {
				"content": "안녕하세요 왜 안되지"
			}
		})
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}


// 게시글 수정
function editItem() {
	// 첫번째 파라미터: URL(세그먼트 파라미터란? 영향을 주고싶은 게시글id), 두번째 파라미터: 옵션
	fetch('http://localhost:8000/api/item/3', {
		method: 'PUT',
		// headers: 통신할때 필요한 설정들 해줌.
		headers: {
			"Content-Type": "application/json"
		},
		// stringify() : 객체를 JSON으로 바꿔줌
		body: JSON.stringify({
			"data": {
				"completed": "1"
			}
		})
	})
	// response로 받은 데이터 콘솔로 찍어봄
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}


// 게시글 삭제
function destroyItem() {
	// 첫번째 파라미터: URL(세그먼트 파라미터란? 영향을 주고싶은 게시글id), 두번째 파라미터: 옵션
	fetch('http://localhost:8000/api/item/3', {
		// 데이터를 안보내줘도 되기때문에 headers, body가 필요없음
		method: 'DELETE'
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}