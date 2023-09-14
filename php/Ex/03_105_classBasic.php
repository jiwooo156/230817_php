<?php

// class는 동종의 객체들이 모여있는 집합을 정의한 것

// 클래스명은 보통 첫글자를 대문자로 한다.
class ClassRoom {
//     // 멤버필드

//     // 접근제어 지시자 : public, private, protected
//     // 멤버 변수
//     public $computer; // 어디에서나 접근 가능
//     private $book; // class 내에서만 접근 가능
//     protected $bag; // class와 나를 상속 받은 자식 class 내에서만 접근 가능
//     private $now;


// // 생성자(constructor) : 
// //      -클래스를 이용하여 객체를 생성할 때 사용
// //      -생성자를 정의 하지 않을때는 디폴트 생성자가 선언 됨
// //      -클래스를 인스턴스 
//     public function _construct(){  // 디폴트 construct
//            echo "컨스트럭트 실행";
//     $this->now = date("Y-m-d H:i:s");
//     }


// 메소드(method) : class내에 있는 함수
// public function class_room_set_value(){
//     $this->computer = "컴퓨터";
//     $this->book = "책";
//     $this->bag = "가방";
// }

//     // 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
//     public function classRoomPrint() {
//         $str = $this->computer."\n".
//                 $this->book."\n".
//                 $this->bag;
//         echo $str;
//     }
// }


// getter 메소드
// public function get_now(){
//         return $this->$now;
//     }


// // setter 메소드
// public function set_now(){
//     $this->now = "9999-01-01 00:00:00";


// static : instance를 생성하지 않아도 호출할 수 있는 객체
// (스스로 미리 메모리에 올라가있기 때문이다.)
// public static function static_test(){
//     echo "스태틱 메소드";
// }
}

// // class instance 생성  ( 이 클래스를 사용하기 위해서 메모리에 올리는것 )
// $objClassRoom = new ClassRoom();     // static은 instance 생성하지 않아도 됨
// $objClassRoom->computer = "test";
// // var_dump($objClassRoom->computer);

// // $objClassRoom->class_room_set_value();
// // $objClassRoom->classRoomPrint();
// $obj_classRoom->set_now();  // construct가 실행됨
// echo $obj_classroom->now;   // public일때 가져오는 법
// echo $obj_classroom->get_now();   //pirvate일때 가져오는 법

// static 사용방법
// ClassRoom::static_test();


?>