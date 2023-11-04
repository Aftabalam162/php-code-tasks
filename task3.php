Building a Shape Hierarchy

Create a hierarchy of shape classes in PHP. Implement the following features:

Create an abstract class Shape with an abstract method area() that should be implemented by its subclasses. The Shape class should also have properties to store the shape's name.

Create three concrete classes that inherit from Shape: Circle, Rectangle, and Triangle. Each of these classes should implement the area() method to calculate and return the area of their respective shapes.

Define a common interface called Resizable with a method resize($scale) to resize a shape. The scale parameter should determine how much the shape's size should be changed (e.g., 0.5 for a 50% reduction).

Implement the Resizable interface in the Circle, Rectangle, and Triangle classes. When resizing a shape, update its properties accordingly.

Create instances of each shape, calculate and display their areas, and then resize them using the Resizable interface. Display the new areas after resizing.

This task allows you to work with abstract classes, concrete classes, and interfaces while implementing object-oriented principles. You'll create a simple hierarchy of shapes and demonstrate resizing functionality.


<?php

abstract class Shape implements Resizable{
    public $shapeName;
    
    public function __construct($shapeName) { $this->shapeName = $shapeName;}
    
    abstract function area();
    
    public function resize($scale) {
        return $this->area() * (1 - $scale);
    }
    
}

interface Resizable {
    public function resize($scale);
} 

class Circle extends Shape {
    
    public $radius = 0;
    
    function __construct($radius) {
        parent::__construct("Circle");
        $this->radius = $radius;
    }
    
    function area() {
        $radius = $this->radius;
        return 3.14*$radius*$radius;
    }
}

class Rectangle extends Shape {
    
    public $length = 0, $width = 0;
    
    function __construct($length, $width) {
        parent::__construct("Rectangle");
        $this->length = $length;
        $this->width = $width;
    }
    
    function area() {
        return $this->length * $this->width;
    }

}

class Triangle extends Shape {
    
    public $height = 0, $base =0;
    
    function __construct($height, $base) {
        parent::__construct("Triangle"); 
        $this->height = $height;
        $this->base = $base;
        
    }
    
    function area() {
        return 0.5 * $this->height * $this->base;
    }
}


$circle = new Circle(5);

echo $circle->area() . "\n";
echo $circle->resize(0.3) . "\n";
  
$rectangle = new Rectangle(30, 10);
echo $rectangle->area() . "\n";
echo $rectangle->resize(0.2) . "\n";

$triangle = new Triangle(10, 10);
echo $triangle->area() . "\n";
echo $triangle->resize(0.5) . "\n";

?>
