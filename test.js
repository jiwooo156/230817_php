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
	.catch();

	return false;
}
