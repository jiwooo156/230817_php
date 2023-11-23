<?php
namespace test;

class Poketmon {
	protected $howling;
	private	$name;
	protected $type;

	public function __construct($howling, $name, $type) {
		$this->howling = $howling;
		$this->name = $name;
		$this->type = $type;
	}

	public function 자기소개() {
		echo $this->name."는 ".$this->type." 포켓몬입니다.";
	}

	public function 몸통박치기() {
		echo $this->name."!! 몸통박치기";
	}

	// 게터메소드
	public function getterName() {
		return $this->name;
	}
}