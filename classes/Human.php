<?php

class Human
{
    // プロパティ
    const MAX_HITPOINT = 100; // 最大HPの定義　定数
    public $name;  // 人間の名前
    public $hitPoint; // 現在のHP
    public $attackPoint = 20; // 攻撃力

    // 攻撃するメソッド
    public function doAttack($enemy)
    {
        echo "「" . $this->name . "」の攻撃!\n";
        echo "「" . $enemy->name . "」に" . $this->attackPoint . "のダメージ!\n";
        $enemy->tookDamage($this->attackPoint);
    }

    // ダメージを受けるメソッド
    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}