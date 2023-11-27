<template>
	<div>
		APP VUE 컴포넌트!!1
		<h2>{{ $store.state.testStr }}</h2>
		<h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
		<h2>라라벨 데이터 id : {{ laravelData.id }}</h2>
		<ul>
			<!-- 라라벨의 라우터(데이터 받아옴) -->
			<li><a href="/">루트</a></li>
			<li><a href="/login">로그인</a></li>
			<li><a href="/board">보드</a></li>
		</ul>
		<!-- vue의 라우터링크 : 화면만 리렌더링하는 것(데이터 안받아옴) -->
		<router-link to="/login">라우터 로그인</router-link>
		<router-link to="/board">라우터 보드</router-link>
		<router-view></router-view>
	</div>
</template>
<script>
export default {
	name: 'AppComponent',
	props: {
		laravelData: Object,
	},
	beforeCreate() {
		this.$store.commit('setLaravelData', this.laravelData);
	},
}
</script>
<style>
	
</style>