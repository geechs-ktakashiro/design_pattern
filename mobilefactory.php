<?php
class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . 'の' . $this->vehicleModel;
    }
}

class AutomobileFactory
//ファクトリーの役割をするクラス
//インスタンスの製造工場
{
    public static function create($make, $model)
    {
        return new Automobile($make, $model);
    }
}

// ファクトリーを使って Automobile オブジェクトを作る
$prius = AutomobileFactory::create('TOYOTA', 'プリウス');

print_r($prius->getMakeAndModel()); // 出力は "TOYOTAのプリウス"


//メリット１-> もし後で Automobile クラスに手を入れたり名前を変更したり別のものに入れ替えたりすることになっても簡単にできるということ。 単にファクトリーの中のコードを変更すれば済むわけで、 コードの中でAutomobileクラスを使っているところをひとつひとつ修正するとかいうことはしなくてもよい。 
// メリット2 -> 仮にオブジェクトの生成が複雑な作業になってしまっても、 そのすべてのファクトリーに閉じ込めてしまえること。 新しいインスタンスを作るたびに毎回同じようなことを繰り返さずに済む。
//http://ja.phptherightway.com/pages/Design-Patterns.html
