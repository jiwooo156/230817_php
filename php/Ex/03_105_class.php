<?php

// class는 동종의 객체들이 모여있는 집합을 정의한 것

// 클래스명은 보통 첫글자를 대문자로 한다.
class ClassRoom {
    // 멤버필드

    // 접근제어 지시자 : public, private, protected
    // 멤버 변수
    public $computer; // 어디에서나 접근 가능
    private $book; // class 내에서만 접근 가능
    protected $bag; // class와 나를 상속 받은 자식 class 내에서만 접근 가능

    // 메소드(method) : class내에 있는 함수
    public function class_room_set_value(){
        $this->computer = "컴퓨터";
        $this->book = "책";
        $this->bag = "가방";
    }

    // 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
    public function classRoomPrint() {
        $str = $this->computer."\n".
                $this->book."\n".
                $this->bag;
        echo $str;
    }
}

// class instance 생성  ( 이 클래스를 사용하기 위해서 메모리에 올리는것 )
$objClassRoom = new ClassRoom();
$objClassRoom->computer = "test";
// var_dump($objClassRoom->computer);

$objClassRoom->class_room_set_value();
$objClassRoom->classRoomPrint();


?>