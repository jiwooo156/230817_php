<?php

class Parents {
    // 상속 : 부모 클래스의 property를 자식 클래스가 상속받는 것
    // 접속제한자를 protected 쓰면 상속관계끼리만 사용할 수 있음 (그래서 class 외부에서 출력하려면 안됨)
    public function print_p() {
        echo "부모 클래스에서 출력\n";
    }
}


class Child extends Parents {
    // 부모클래스의 객체를 가져와서 씀
    // 오버라이딩 : 부모 클래스에서 정의한 property를 자식클래스에서 재정의 하는 것 (상속받은 메소드(또는 다른 property)를 안의 내용만 재정의해서 사용.)
    public function print_p() {
        parent::print_p();  // 상속받은 부모 클래스의 property를 사용하고 싶을 때 (부모 클래스의 print_p도 출력하고, 내가 오버라이딩한 print_p도 출력함.)
        echo "자식 클래스에서 출력";
    }
}

$obj_child = new Child();

$obj_child->print_p();


?>