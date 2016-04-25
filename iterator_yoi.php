<?php

/*
 * 高城くん
 * 自分の本を管理する役割を担う
 */
class Takashiro {

	//本棚の本
	private $books_in_book_shelf = array('PHPの教科書', 'インターネットの仕組み', 'FuelPHP入門');

	//n冊目
	private $position = 0;

	/*
	 * 次の本があるか判定する
	 */
	public function has_next()
	{
		//本を取得
		$books = $this->books_in_book_shelf;

		//次の本があるかどうか
		$has_next = isset($books[$this->position]);

		return $has_next;
	}

	/*
	 * 本を取り出す
	 */
	public function pick_up_book()
	{

		//本を取得
		$books 	= $this->books_in_book_shelf;

		//結果
		$book 	= $books[$this->position];

		return $book;

	}

	/*
	 * 次の本に進む
	 */
	public function next()
	{
		//本の冊数を１つ進める
		$this->position++;

	}

}

/*
 * 高城くん
 * 本を好きかどうか判断する
 */
class Tencho {

	/**
	 * 好きでいられる、本の題名の短さ
	 */
	public $acceptable_name_length = 7;

	function check_is_like($book){

		//基本本は嫌い
		$result = false;

		//本の題名を確認する
		$name_length = mb_strlen($book);

		//本の題名が、いい感じに短ければ
		if($name_length <= $this->acceptable_name_length){
			//好きな本と認識
			$result = true;
		}

		return $result;

	}

}

//高城くん出現
$takashiro 						= new Takashiro();

//店長出現
$tenchou 						= new Tencho();

$books_Tencho_likes = array();

//高城くんが本を１冊づつ出してくる。
//次の本がない場合、処理を止める
while ($takashiro->has_next()){

	//高城くんが本を取り出す
	$book = $takashiro->pick_up_book();

	//店長が該当の本を好きな場合
	if($tenchou->check_is_like($book)){
		$books_Tencho_likes[] = $book;
	}

	//次の本に進む
	$takashiro->next();

}

echo "デザインパターン使う場合<br>";
echo "店長が、高倉くんから借りたい本は：<br>";

foreach ($books_Tencho_likes as $book) {

	echo $book."<br>";

}