<?php

// echo '処理の始まり! \n\n';
// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

// インスタンス化
$tiida = new Human();
$goblin = new Enemy();

$tiida->name = 'ティーダ';
$goblin->name = 'ゴブリン';

$turn = 1;
// どちらかのHPが0になるまでを繰り返す。
while($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
    echo "*** $turn ターン目 *** \n\n";

    // 現在のHPを表示
    echo $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
    echo "\n";

    // 攻撃
    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";
    
    $turn ++;
}

echo "==== 戦闘終了 \n\n";
echo $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";