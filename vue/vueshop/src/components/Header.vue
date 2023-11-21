<template>
	<div class="nav">
		<!-- 반복문 -->
		<a v-for="item in data" :key="item">{{ item }}</a>
	</div>
</template>
<script>
export default {
	// 파일명
	name: 'Header',

	// props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기위한 영역
	props: {
		// 받는 데이터명: 데이터의 타입
		data: Array,
	}
}

</script>
<style>
	
</style>