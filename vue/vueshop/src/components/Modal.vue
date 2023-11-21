<template>
	<div class="bg_black"  name="modalAni">
      <div class="bg_white">
        <img :src="data.img">
        <h4>{{ data.name }}</h4>
        <p>{{ data.content }}</p>
        <p>{{ data.price }} 원</p>
		<input 
		type="text"
		v-model="productCnt">
		<p>총 가격 : {{ productCnt * data.price }} 원</p>
        <p>신고 회수 : {{ data.reportCnt }}</p>
        <button @click="$emit('closeModal')">닫기</button>
      </div>
    </div>
</template>
<script>
export default {
	name: 'Modal',
	data() {
		return {
			productCnt: 0,
		}
	},
	// watch : data를 감시하는 함수를 정의하는 영역
	watch: {
		// *** 함수명은 감시하고 싶은 데이터바인딩명과 동일해야 합니다. ***
		// 유저가 입력한 값을 자동으로 파라미터로 받아줌
		productCnt(input) {
			if(input > 10) {
				alert('최대 10개까지 구매가능합니다.');
				this.productCnt = 10;
			} else if(input < 0) {
				alert('적어도 1개 이상은 구매하시길..');
				this.productCnt = 0;
			}
		}
	},
	props: {
		data: Object,
	}
}
</script>
<style>
	
</style>