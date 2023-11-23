<?php

namespace test;

class Kkobugi {
	public $howling;
	private	$name;
	protected $type;

	public function __construct() {
		$this->howling = "꼬북꼬북";
		$this->name = "꼬부기";
		$this->type = "물";
	}

	public function 자기소개() {
		echo $this->name."는 ".$this->type." 포켓몬입니다.";
	}

	public function 몸통박치기() {
		echo $this->name."!! 몸통박치기";
	}

	public function 물대포() {
		echo $this->name."!! 물대포!!";
	}
}



