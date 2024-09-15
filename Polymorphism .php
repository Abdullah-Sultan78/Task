
<!-- Task-4 -->
<?php

class Animal {
    public function Sound() {
    echo "Animal makes a sound.";
    }
}


class Dog extends Animal {
    public function Sound() {
         echo "Dog barks.";
    }
}
$obj = new Dog();
$obj->Sound();
$obj2 = new Animal();
$obj2->Sound();

?>