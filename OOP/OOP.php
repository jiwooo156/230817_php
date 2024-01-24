<?php
// 인터페이스 (다중상속이 가능함)
// public 밖에 못씀
interface 수영 {
	public function 수영();
}

interface 기름 {
	public function 기름();
}


// 추상 클래스 (다중상속 불가능함)
abstract class 포유류 {
	protected $이름;
	
	// 추상메소드 
	// - 자식들은 무조건 재정의해서 써야됨. 값이 달라도
	// - 공통되는게 형태만. 값은 아님.
	abstract public function 호흡();

	public function __construct(string $이름) {
		$this->이름 = $이름;
	}

	// 추상메소드가 아니라서 자식쪽에서 써도되고 안써도되는 메소드.
	public function 출산() {
		echo $this->이름. '출산한다.';
	}
}

class 날다람쥐 extends 포유류 {
	public function 호흡() {
		echo $this->이름.'폐호흡한다.';
	}

	public function 비행() {
		echo $this->이름.'날아간다.';
	}
}

// extends는 무조건 써야함, implements는 안써도 됨.
class 고래 extends 포유류 implements 수영 {
	// 추상메소드는 자식쪽에서 무조건 재정의 해줘야함.
	public function 호흡() {
		echo $this->이름.'바다에서 폐호흡한다.';
	}

	public function 수영() {
		echo $this->이름. '수영한다.';
	}
}

// 인터페이스 (강제성)
class 고등어 implements 수영 {
	public function 수영() {
		echo '고등어 수영한다.';
	}
}


// $obj = new 날다람쥐('날다람쥐');
// echo $obj->호흡();

$obj = new 고래('고래');
echo $obj->수영();

$obj = new 고등어();
echo $obj->수영();


