<?php

class Enemy
{
    const MAX_HITPOINT = 50; // 最大HPの定義　定数
    public $name; // 敵の名前
    public $hitPoint = 50; // 現在のHP
    public $attackPoint = 10; // 攻撃力

    // 攻撃するメソッド
    public function doAttack($human)
    {
        echo "『" .$this->name . "』の攻撃！\n";
        echo "「" . $human->name . "」に " . $this->attackPoint . " のダメージ！\n";
        $human->tookDamage($this->attackPoint);
    }

    // ダメージを受けるメソッド
    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}