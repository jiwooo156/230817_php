<?php

namespace test;

// 클래스 생성
class Picachu {
	// 접근 제어 지시자 (캡슐화 : 외부에서 마음대로 데이터를 접근못하게)
	public $howling;
	private	$name;		// 나만 사용가능함 자식이 사용하려고해도 안됨.
	protected $type;	// 나와 상속관계까지 사용가능함

	// 무조건 실행되는 메소드 : construct (없으면 디폴트로 실행됨) (무조건 public으로 선언해야됨)
	public function __construct() {
		// $this : 나한테 있는 것에 접근함
		$this->howling = "피카피카";
		$this->name = "피카츄";
		$this->type = "전기";
	}
	
	public function 자기소개() {
		echo $this->name."는 ".$this->type." 포켓몬입니다.";
	}

	public function 몸통박치기() {
		echo $this->name."!! 몸통박치기";
	}

	// public function 백만볼트() {
	// 	echo $this->name."!! 백만볼트!";
	// }
	
	public static function 백만볼트() {
		echo "피카츄!! 백만볼트!";
	}
	
	// private, protected 값에 접근할 수 없음. 근데 게터메소드를 사용하여 접근가능함.
	// picachu클래스에 소속된 게터메소드로 private으로 선언된 name에 접근가능함.
	// public function getterName() {
	// 	return $this->name;
	// }
}











?>