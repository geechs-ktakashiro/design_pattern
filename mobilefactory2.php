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

class AutomobileB
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
//オブジェクトの製造工場
//ここが中間層になってのちに修正する際に修正範囲が狭まる
{
    public static function create($make, $model)
    {
        //インスタンス化の際に複雑なオプションが必要なときに役立つ
        //例えばDBからデータを取ってきてそれを加工してインスタンス生成する場合
        DB->dhjkhfaehnjdnfjanjfll

        if(){
            new AutomobileB($make, $model);
        }else{
            new Automobile($make, $model);
        }
        return new Automobile($make, $model);
    }
}

// ファクトリーを使って Automobile オブジェクトを作る
$prius = AutomobileFactory::create('TOYOTA', 'プリウス');

print_r($prius->getMakeAndModel()); // 出力は "TOYOTAのプリウス"


//メリット１-> もし後で Automobile クラスに手を入れたり名前を変更したり別のものに入れ替えたりすることになっても簡単にできるということ。 単にファクトリーの中のコードを変更すれば済むわけで、 コードの中でAutomobileクラスを使っているところをひとつひとつ修正するとかいうことはしなくてもよい。 
// メリット2 -> 仮にオブジェクトの生成が複雑な作業になってしまっても、 そのすべてのファクトリーに閉じ込めてしまえること。 新しいインスタンスを作るたびに毎回同じようなことを繰り返さずに済む。
//http://ja.phptherightway.com/pages/Design-Patterns.html
