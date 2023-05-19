<?php
class Animal {
    protected $name;
    protected $species;

    public function __construct($name, $species) {
        $this->name = $name;
        $this->species = $species;
    }

    public function getInfo() {
        return "His name is " . $this->name . " and he is a " . $this->species . ".";
    }
}

class Cat extends Animal {
    public function __construct($name) {
        parent::__construct($name, "cat");
    }

    public function getInfo() {
        return parent::getInfo() . " He likes to plays and cute.";
    }
}

class Dog extends Animal {
    public function __construct($name) {
        parent::__construct($name, "dog");
    }

    public function getInfo() {
        return parent::getInfo() . " He is loyal and a good friend of mine.";
    }
}

$animal = new Animal("Thomas", "mamalia");
$cat = new Cat("Nicho");
$dog = new Dog("Chris");

echo $animal->getInfo();
echo "<br>";
echo $cat->getInfo(); 
echo "<br>";
echo $dog->getInfo();  
?>