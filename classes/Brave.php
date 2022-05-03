<?php

class Brave extends Human
{
    const MAX_HITPOINT = 120;
    public $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;

    private static $instance;

    private function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    // シングルトンで常にインスタンスは1つしか生成しない
    public static function getInstance($name) 
    {
        if(empty(self::$instance)) {
            self::$instance = new Brave($name);
        }

        return self::$instance;
    }

    public function doAttack($enemies)
    {
        // 自分のHPが0以上か、敵のHOが0以上かなどをチェックするメソッドを用意
        if(!$this->isEnableAttack($enemies)) {
            return false;
        }
        // ターゲットの決定
        $enemy = $this->selectTarget($enemies);

        // 乱数の発生
        if(rand(1,3) === 1) {
            // スキルの発動
            echo "「" . $this->getName() . "」のスキルが発動した！\n";
            echo "「全力攻撃！！\n";
            echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ!\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }
}