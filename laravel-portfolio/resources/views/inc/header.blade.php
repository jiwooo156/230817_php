<header>
	<!-- 헤더 -->
	<div class="main_view_header">
		<!-- 헤더 첫번째 영역 -->
		<div class="header_inner">
			<!-- 로고영역 : 메인페이지로 이동 -->
			<div class="header_logo">
				<a href="#">
					<img class="header-logo-img" src="https://image.hago.kr/dev/main/pc/pc_main_logo.svg" alt="logo">
				</a>
			<!-- //로고 -->
			</div>
			<!-- 검색바 -->
			<div class="header_search">
				<div class="header_search_form">
					<form>
						<div class="form_text">
							{{-- <label for="search_word"></label> --}}
							<input type="text" id="search_word">
							<button type="button" class="btn_search">
								<img src="https://image.hago.kr/dev/main/pc/pc_search.svg" alt="search">
								<b class="ir_blind">검색하기</b>
							</button>
						</div>
					</form>
				</div>
			<!-- //검색바 -->
			</div>
			<!-- 로그인,마이페이지,장바구니 -->
			<div class="header-quick">
				<ul>
					<li class="renewal-login">
						<a href="#">
							<img src="{{  }}" alt="login">
							<b>로그인</b>
						</a>
					</li>
					<li class="renewal-mypage">
						<a href="https://www.hago.kr/mypage">
							<img src="https://image.hago.kr/dev/main/pc/mypage.svg" alt="mypage">
							<b>마이페이지</b>
						</a>
					</li>
					<li class="renewal-cart">
						<a href="https://www.hago.kr/cart">
							<img src="https://image.hago.kr/dev/main/pc/cart.svg" alt="cart">
							<b>장바구니</b>
						</a>
					</li>
				</ul>
			<!-- //로그인 -->
			</div>
		<!-- //헤더 첫번째영역 -->
		</div>
		<!-- 헤더 두번째영역 -->
		<div class="header_inner_sec">
			<!-- nav영역 -->
			<div class="header_nav">
				<nav>
					<div class="header_nav_inner">
						<ul>
							<li>
								<a href="#">
									<b>홈</b>
								</a>
							</li>
							<li>
								<a href="#">
									<b>어패럴</b>
								</a>
							</li>
							<li>
								<a href="#">
									<b>잡화</b>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			<!-- //nav -->
			</div>
		<!-- //헤더 두번째영역 -->
		</div>
	<!-- //헤더 -->
	</div>
</header>