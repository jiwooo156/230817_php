<?php

// 자동차 클래스
class Car {
	protected $name = "";
	protected $comp = "";

	protected function move() {
		echo "전진!\n";
	}
	protected function stop() {
		echo "정지!\n";
	}
	public function auto() {
		echo $this->comp." ".$this->name." ".$this->move();
	}
}

class Kia extends Car {
	public function __construct($name) {
		$this->name = $name;
		$this->comp = "기아";
	}
}

class Toyota extends Car {
	public function __construct($name) {
		$this->name = $name;
		$this->comp = "토요타";
	}
}

$obj = new Kia("레이");	// construct가 없으니까 default가 생성된것임 
// $obj->move();		// class밖에서 메소드 사용할 수 없음
$obj->auto();		// protected이라 원래 class밖에서 사용 못하는데 public 메소드에 넣어서 사용할 수 있게됨
// $obj->name;		// 변수를 호출함. (근데 protected이라 class밖에서 못 씀)

$obj2 = new Toyota("크라운");
$obj2->auto();


?>