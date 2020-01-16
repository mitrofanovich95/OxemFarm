<?php

class Animal {
    protected $id;
    private $animal_type;
    private $product_type;
    private $lowest_product;
    private $highest_product;

    public function __construct($animal_type, $product_type, $lowest_product, $highest_product) {
      $this->id = rand(1000, 9999);
      $this->animal_type = $animal_type;
      $this->product_type = $product_type;
      $this->lowest_product = $lowest_product;
      $this->highest_product = $highest_product;
    }

    public function getProduct() {
        return rand($this->lowest_product, $this->highest_product);
    }

    public function getType() { return $this->animal_type; }
    public function setType($animal_type) { $this->animal_type = $animal_type; }

    public function getProductType() { return $this->product_type; }
    public function setProductType($product_type) { $this->product_type = $product_type; }

    public function getLowProduct() { return $this->lowest_product; }
    public function setLowProduct($lowest_product) { $this->lowest_product = $lowest_product; }

    public function getHighProduct() { return $this->highest_product; }
    public function setHighProduct($animal_type) { $this->highest_product = $highest_product; }
}

class Farm {
    private static $animals = [];

    public static function setAnimal($type, $product_type, $min, $max) {
        self::$animals[$type][] = new Animal($type, $product_type, $min, $max);
    }
    public static function setAnimals($count, $type, $product_type, $min, $max) {
        for ($i = 0; $i < $count; $i++)
          self::$animals[$type][] = new Animal($type, $product_type, $min, $max);
    }


    public static function getProducts() {
      // echo '<pre>'.print_r(self::$animals, true).'</pre>';

      foreach (self::$animals as $animals_type) {
        $products = 0;
        for ($i = 0; $i < count($animals_type); $i++) {
          $products += $animals_type[$i]->getProduct();
        }
        echo $animals_type[0]->getType() . ': ' . $animals_type[0]->getProductType() . ' - ' . $products . '<br>';
      }

    }
}


Farm::setAnimals(10, 'cow', 'Milk', 8, 12);
Farm::setAnimals(20, 'chicken', 'Eggs', 0, 1);
Farm::getProducts();
