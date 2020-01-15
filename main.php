<?php

class Animal {
    protected $id;
    public static $lowest_product;
    public static $highest_product;

    public function __construct() {
      $this->id = rand(1000, 9999);
    }

    public function getProduct() {
        return rand(static::$lowest_product, static::$highest_product);
    }

}

class Cow extends Animal {
    public static $lowest_product = 8;
    public static $highest_product = 12;
}

class Chicken extends Animal {
    public static $lowest_product = 0;
    public static $highest_product = 1;
}


class Farm {
    private static $cows = [];
    private static $chickens = [];
    private static $milk = 0;
    private static $eggs = 0;

    public static function setCow() {
            self::$cows[] = new Cow();
    }
    public static function setCows(int $count) {
        for ($i = 0; $i < $count; $i++)
          self::$cows[] = new Cow();
    }

    public static function setChicken() {
        self::$chickens[] = new Chicken();
    }
    public static function setChickens(int $count) {
        for ($i = 0; $i < $count; $i++)
          self::$chickens[] = new Chicken();
    }


    public static function getProducts() {
        for ($i = 0; $i < count(self::$cows); $i++)
          self::$milk += self::$cows[$i]->getProduct();

        for ($i = 0; $i < count(self::$chickens); $i++)
            self::$eggs += self::$chickens[$i]->getProduct();

        echo "Всего молока: " . self::$milk . "<br>";
        echo "Всего яиц: " . self::$eggs;
    }
}


Farm::setCows(10);
Farm::setChickens(20);
Farm::getProducts();
