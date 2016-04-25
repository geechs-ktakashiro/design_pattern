<?php

interface Strategies
{
	public function askDating();
}

/*
 * 出会い系サイトを使うぜ
 */
class UseDatingService implements Strategies
{
	public function askDating()
	{
		echo "出会い系サイトを使うぜ！！<br>";
	}
}

/*
 * ナンパ
 */
class Nanpa implements Strategies
{
	public function askDating()
	{
		echo "ナンパだぜ！！<br>";
	}
}

/*
 * 男クラス
 */
class Boy {

	//戦略を決心
	public function setStrategy($strategy)
	{
		$this->strategy = $strategy;
	}

	//女の子を誘う
	public function aisiteru()
	{
		return $this->strategy->askDating();
	}

}

class Tencho extends Boy{

	public function __construct() {

		$nanpa = new Nanpa();

		$this->setStrategy($nanpa);

	}

}

//店長を生成
class Takashiro extends Boy{

	public function __construct() {

		$nanpa = new UseDatingService();

		$this->setStrategy($nanpa);

	}

}

//店長を生成
$tencho = new Tencho();
//ナンパに誘う
$tencho->aisiteru();

//高城くんを生成
$takashiro = new Takashiro();
//出会い系で誘う
$tencho->aisiteru();
