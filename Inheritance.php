<!-- Task 1 -->
<?php
     define('pi',3.1416);
class Shape {
    public function calculateArea() {
        echo "Calculating area of a geometric  shape.";
    }
}

class Rectangle extends Shape {
    private $length;
    private $width;
    private $radious;


    public function __construct($length, $width, $radious) {
        $this->length = $length;
        $this->width = $width;
        $this-> radious = $radious;
    }

    public function calculateArea() {
        $area = $this->length * $this->width;
        $cir = pi * $this-> radious * $this-> radious;
        echo "Area of the rectangle: ". $area.'</br>';
        echo "Area of the Circle: ". $cir;
    }
}
$rectangle = new Rectangle(5, 10,6);
$rectangle->calculateArea(); 
