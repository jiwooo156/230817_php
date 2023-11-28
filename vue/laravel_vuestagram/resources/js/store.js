import { createStore } from "vuex";
import axios from 'axios';		//  axios : 비동기 통신 라이브러리

const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {
			boardData: [],	// 게시글 저장용
			flgTapUI: 0,	// 탭 UI용 플래그
			imgURL: '',		// 작성 탭 표시용 이미지 URL 저장용
			postFileData: null,	// 글 작성용 파일데이터 저장용
			lastBoardId: 0,		// 가장 마지막 로드 된 게시글 번호 저장용
			flgBtnMoreView: true,	// 더보기 버튼 활성여부 플래그
		}
	},
	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
		// 초기 데이터 셋팅용
		// 위의 state를 자동으로 파라미터로 세팅해줌
		setBoardList(state, data) {
			// boardData에 데이터 push함
			state.boardData = data;
			state.lastBoardId = data[data.length -1].id;
		},
		// 탭 UI 세팅용
		setFlgTapUI(state, num) {
			state.flgTapUI = num;
		},
		// 작성탭 표시용 이미지 URL 세팅용
		setImgURL(state, url) {
			state.imgURL = url;
		},
		// 글작성 파일데이터 세팅용
		setPostFileData(state, file) {
			state.postFileData = file;
		},
		// 작성된 글 삽입용 (unshift : 제일 위에 글 추가)
		setUnshiftBoard(state, data) {
			state.boardData.unshift(data);
		},
		// 더보기 데이터 추가 (push : 제일 아래에 글 추가)
		setPushBoard(state, data) {
			state.boardData.push(data);		
		},
		// 마지막 게시글 id 셋팅용
		setLastBoardId(state, num) {
			state.lastBoardId = num;
		},
		// 더보기 버튼 활성화
		setflgBtnMoreView(state, boo) {
			state.flgBtnMoreView = boo;
		},
		// 작성 후 초기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			state.postFileData = null;
		}
	},
	// actions : 비동기처리 함수 저장 영역
	// 			 ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	actions: {
		// 초기 게시글 데이터 획득 ajax처리
		actionGetBoardList(context) {
			const url = '/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat' 
				}
			};
			axios.get(url, header)
			.then(res => {
				// commit() : mutation을 호출하는 함수
				// json에서 기존타입의 데이터로 바뀌어서 data에 담겨있음
				context.commit('setBoardList', res.data);
			})
			.catch(err => {
				console.log(err);
			})
		},
		// 글 작성 처리
		actionPostBoardAdd(context) {
			const url = '/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
					'Content-Type': 'multipart/form-data', 
				}
			};
			// const data = {
			// 	name: '정지우',
			// 	img: context.state.postFileData,
			// 	content: document.getElementById('content').value,
			// };		
			const formData = new FormData();
			// formData.append(name, value)
			formData.append('name', '정지우');
			formData.append('img', context.state.postFileData);
			formData.append('content', document.getElementById('content').value);

			axios.post(url, formData, header)
			.then(res => {
				// 작성글 데이터 저장
				context.commit('setUnshiftBoard', res.data);
				// 리스트 UI로 전환
				context.commit('setFlgTapUI', 0);
				// 작성 후 초기화 처리
				context.commit('setClearAddData');
			})
			.catch(err => {
				console.log(err);
			});
		},
		// 마지막 게시글 불러오는 처리
		actionGetBoardItem(context) {
			const url = '/api/boards/'+context.state.lastBoardId;	//마지막 게시글id 파라미터 추가
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
				}
			};
			axios.get(url, header)
			.then(res => {
				// 화면에 출력해줌
				if(res.data) {
					context.commit('setPushBoard', res.data);
					context.commit('setLastBoardId', res.data.id);
				} else {
					// context.state.lastBoardId = 0;
					context.commit('setflgBtnMoreView', false);
				}				
			})
			.catch(err => {
				console.log(err.response.data);
			});
		},		
	}
});

export default store;