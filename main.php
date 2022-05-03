<?php

// echo '処理の始まり! \n\n';
// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

// インスタンス化
$members = [];
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

// $tiida = new Brave('ティーダ');
$enemies = [];
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ポム', 25);
$enemies[] = new Enemy('モルボル', 30);

$turn = 1;

$isFinishFlg = false;

// どちらかのHPが0になるまでを繰り返す。
while(!$isFinishFlg) {
    echo "*** $turn ターン目 *** \n\n";

    // 現在のHPを表示
    foreach($members as $member) {
        echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
    }
    echo "\n";

    foreach($enemies as $enemy) {
        echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
    }
    echo "\n";

    // 攻撃(味方)
    foreach($members as $member) {
        // 白魔道士(whiteMage)の場合、味方のオブジェクトを渡す。
        if(get_class($member) == "WhiteMage") {
            $member->doAttackWhiteMage($enemies, $members);
        } else {
            $member->doAttack($enemies);
        }
        echo "\n";
    }
    echo "\n";

    // 攻撃(敵)
    foreach($enemies as $enemy) {
        $enemy->doAttack($members);
        echo "\n";
    }
    echo "\n";

    // 仲間の全滅チェック
    $deathCount = 0; // HPが0以下の仲間の数
    foreach($members as $member) {
        if($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCount++;
    }
    if($deathCount === count($members)) {
        $isFinishFlg = true;
        echo 'GAME OVER.....\n\n';
        break;
    }

    // 敵の全滅チェック
    $deathCount = 0; // HPが0以下の敵の数
    foreach($enemies as $enemy) {
        if($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCount++;
    }
    if($deathCount === count($enemies)) {
        $isFinishFlg = true;
        echo "*** クリアーーーーーーーー！\n\n";
        break;
    }
    
    $turn ++;
}

echo "==== 戦闘終了 \n\n";

// 現在のHPの表示
foreach($members as $member) {
    echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";

foreach($enemies as $enemy) {
    echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
}

