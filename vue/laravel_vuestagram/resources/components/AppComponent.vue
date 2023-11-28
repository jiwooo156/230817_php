<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li v-if="$store.state.flgTapUI !== 0" @click="gotolist()" class="header-button header-button-left">취소</li>
      <li><img class="logo" alt="Vue logo" src="/css/logo.png"></li>
      <li 
        v-if="$store.state.flgTapUI === 1"
        @click="addBoard()"
        class="header-button header-button-right">작성</li>
    </ul>
  </div>
  <!-- vuex파일에 접근 ex) $store.state.phptest  -->

  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <button 
    v-if="$store.state.lastBoardId > 1"
    @click="$store.dispatch('actionGetBoardItem')">더보기</button>
  
  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './ContainerComponent.vue';

export default {
  name: 'AppComponent',
  created() {
    // store의 action 호출
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    updateImg(e) {
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기 위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 UI 변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUI', 1);

      // 이벤트 타겟 초기화
      e.target.value = '';
    },
    // flg = 0 처리 (리스트로 이동)
    gotolist() {
      this.$store.commit('setFlgTapUI', 0);
    },
    // 글 작성 처리
    addBoard() {
      // dispatch : actions를 호출하는 함수
      this.$store.dispatch('actionPostBoardAdd')
    },

  },
  components: {
    ContainerComponent,
  },
}
</script>

<style>
/* import앞에 @붙이는것 : css 문법 */
@import url('/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
