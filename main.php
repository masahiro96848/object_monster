<?php

// echo '処理の始まり! \n\n';
// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

// インスタンス化
$tiida = new Brave('ティーダ');
$goblin = new Enemy('ゴブリン');

$turn = 1;
// どちらかのHPが0になるまでを繰り返す。
while($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
    echo "*** $turn ターン目 *** \n\n";

    // 現在のHPを表示
    echo $tiida->getName() . ":" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";
    echo "\n";

    // 攻撃
    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";
    
    $turn ++;
}

echo "==== 戦闘終了 \n\n";
echo $tiida->getName() . ":" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";