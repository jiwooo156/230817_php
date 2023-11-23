<?php

namespace test;

require_once('./Poketmon.php');		//  require_once를 namespace보다 아래에 작성해야함

use test\Poketmon;

class Kkobugi extends Poketmon{
	// 부모클래스에서 상속받아오므로 자식클래스에는 공통부분은 작성하지 않아도됨
		// public $howling;
		// private	$name;
		// protected $type;

		// public function __construct() {
		// 	$this->howling = "꼬북꼬북";
		// 	$this->name = "꼬부기";
		// 	$this->type = "물";
		// }

		// public function 자기소개() {
		// 	echo $this->name."는 ".$this->type." 포켓몬입니다.";
		// }

		// public function 몸통박치기() {
		// 	echo $this->name."!! 몸통박치기";
		// }
	// 부모에 게터메소드 생성하고 자식에서 호출하면 물대포메소드(public) 아무데서나 쓸 수 있음
	public function 물대포() {
		echo $this->getterName()."!! 물대포!!";
	}

	// 오버라이딩 : 부모한테 정의되어 있는 메소드를 자식이 다시 재정의 한 메소드
	// 부모에 메소드가 생성되어있지만 자식이 메소드의 내용을 새로 구성해서 가지고있으면 다른곳에서 메소드를 호출했을때 자식의 메소드가 실행됨.
	public function 자기소개() {
		echo $this->name."는 "."꼬북꼬북꼬뿍";
	}
	// 오버라이딩
	// public function 물대포() {
	// 	echo "싫음";
	// }
}



