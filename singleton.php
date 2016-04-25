<?php
class Singleton {
   private static $instance;

   // コンストラクタをprivateにすることで、外部からnew演算子でインスタンスを作ることを不可能にする。
   private function __construct() {
       echo "しんぐるとんだよ</br>";
   }

   // クラスメソッドでインスタンス化して、オブジェクトを返す
   public static function getInstance() {
       if (!isset(static::$instance)) static::$instance = new Singleton();

       return static::$instance;
   }
}
 
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();
$obj3 = Singleton::getInstance();
 
var_dump($obj1);echo "<br>";
var_dump($obj2);echo "<br>";
var_dump($obj3);echo "<br>";



