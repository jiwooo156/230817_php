<?php
require_once('Picachu.php');
require_once('Kkobugi.php');

// namespace에서 지정된 애를 기준으로 찾아감
// use에서 한번 불러왔으면 인스턴스할때 경로 안써줘도됨
use test\Picachu as pi;
use test\Kkobugi as kk;

// 클래스를 호출하면 기본적으로 클래스내의 construct를 호출함
$obj = new pi();
$obj_kk = new kk();

// howling의 접근 제어 지시자가 public이어서 접근 가능함. 
// echo $obj->howling;

// $obj->몸통박치기();

// 메소드 만들기
// 피카츄는 전기타입 포켓몬입니다. 문자열 출력
// $obj->자기소개();

// $obj->백만볼트();


// $obj->getterName();

// 인스턴스화 없어도 static은 접근가능함.
// pi::백만볼트();

// static아닌 일반메소드는 접근안됨. (인스턴스화 안함, 클래스명::메소드 형식으로 접근할 수 없음)
// pi::getterName();
// $obj->getterName();

// $obj_kk->몸통박치기();
