<?php

class Enemy
{
    const MAX_HITPOINT = 50; // 最大HPの定義　定数
    private $name; // 敵の名前
    private $hitPoint = 50; // 現在のHP
    private $attackPoint = 10; // 攻撃力

    public function __construct($name)
    {
        $this->name = $name;
    }


    // 攻撃するメソッド
    public function doAttack($human)
    {
        echo "『" .$this->getName() . "』の攻撃！\n";
        echo "「" . $human->getName() . "」に " . $this->attackPoint . " のダメージ！\n";
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

    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
}