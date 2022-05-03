<?php

// echo '処理の始まり! \n\n';
// ファイルのロード
require_once('./lib/Loader.php');
require_once('./lib/Utility.php');

// オートロード
$loader = new Loader();
// classesフォルダの中身をロード対象ディレクトリとして登録
$loader->regDirectory(__DIR__ . '/classes');
$loader->regDirectory(__DIR__ . '/classes/constants');
$loader->register();

// インスタンス化
$members = [];
$members[] = Brave::getInstance(CharacterName::TIIDA);
$members[] = new WhiteMage(CharacterName::YUNA);
$members[] = new BlackMage(CharacterName::RULU);


$enemies = [];
$enemies[] = new Enemy(EnemyName::GOBLINS, 20);
$enemies[] = new Enemy(EnemyName::BOMB, 25);
$enemies[] = new Enemy(EnemyName::MORBOL, 30);


$turn = 1;

$isFinishFlg = false;

$messageObj = new Message;

// どちらかのHPが0になるまでを繰り返す。
while(!$isFinishFlg) {
    echo "*** $turn ターン目 *** \n\n";

    // 仲間の表示
    $messageObj->displayStatusMessage($members);

    // 敵の表示
    $messageObj->displayStatusMessage($enemies);

    // 仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);

    // 敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);

    // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
    $isFinishFlg = isFinish($members);
    if($isFinishFlg) {
        $message = "======== GAME OVER ======== \n\n";
        break;
    }

    $isFinishFlg = isFinish($enemies);
    if($isFinishFlg) {
        $message = "======== ミッションクリア ======== \n\n";
        break;
    }

    $turn ++;
}

echo "======= 戦闘終了 ======= \n\n";

echo $message;

// 仲間の表示
$messageObj->displayStatusMessage($members);

// 敵の表示
$messageObj->displayStatusMessage($enemies);