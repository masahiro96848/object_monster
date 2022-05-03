<?php

class WhiteMage extends Human
{
    // プロパティ
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30; // 魔法攻撃力

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
    }

    public function doAttackWhiteMage($enemies, $members)
    {
        // 自分のHPが0以上か、敵のHOが0以上かなどをチェックするメソッドを用意
        if(!$this->isEnableAttack($enemies)) {
            return false;
        }
        // ターゲットの決定
        $enemy = $this->selectTarget($enemies);

        if(rand(1,2) === 1) {
            // ターゲットの決定
            $member = $this->selectTarget($members);

            echo "『" .$this->getName() . "』のスキルが発動した！\n";
            echo "『ケアル』！！\n";
            echo $member->getName() . " に " . $this->intelligence * 1.5 . " の回復！\n";
            $member->recoveryDamage($this->intelligence * 1.5, $member);
        } else {
            // ターゲットの決定
            $enemy = $this->selectTarget($enemies);
            parent::doAttack($enemies);
        }
        return true;
    }

}

?>