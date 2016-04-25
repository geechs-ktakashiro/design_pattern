<?php
class Usual {
   private static $instance;

   public function __construct() {
       echo "しんぐるとんじゃないよ</br>";
   }
}

$obj1 = new Usual();
$obj2 = new Usual();
$obj3 = new Usual();

var_dump($obj1);echo "<br>";
var_dump($obj2);echo "<br>";
var_dump($obj3);echo "<br>";
