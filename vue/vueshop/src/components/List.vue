<template>
	<div>
		<div>
		<h4 @click="$emit('fncOpenModal', data)">{{ data.name }}</h4>
		<p>{{ data.price }} 원</p>
		<button @click="$emit('fncReport', productKey)">허위 매물 신고</button>
		<span>신고횟수 : {{ data.reportCnt }}</span>
		</div>
	</div>
</template>
<script>
export default {
	name: 'List',

	props: {
		data: Object,
		productKey: Number,
	}
}
</script>
<style>
	
</style>