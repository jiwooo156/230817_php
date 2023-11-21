<template>
	<div class="discount">
		<p>지금 당장 구매하시면, {{ discountNum }}% 할인</p>
	</div>
</template>
<script>
export default {
	// 파일명
	name: 'Discount',

	// 데이터 바인딩
	data() {
		return {
			discountNum: 30,
			intervalInfo: null,
		}
	},
	// mounted() : 라이프 사이클 훅, mounted단계에서 실행되는 영역
	mounted() {
		this.intervalInfo = setInterval(() => {
			this.discountNum--;
		}, 1000);
	},
	// updated() : 라이프 사이클 훅, updated단계에서 실행되는 영역
	updated() {
		if(this.discountNum === 10) {
			clearInterval(this.intervalInfo);
		}
	},
}
</script>
<style>
	
</style>