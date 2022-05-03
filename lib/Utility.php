<?php

function isFinish($objects) 
{
    $deathCount = 0; // HPが0以下の仲間の数
    foreach($objects as $object) {
        // 1人でもHPが0を超えていたらfalseを返す
        if($object->getHitPoint() > 0) {
            return false;
        }
        $deathCount++;
    }
    // 仲間の数が死亡数(HPが0以下の数)と同じであればtrueを返す
    if($deathCount === count($objects)) {
        return true;
    }
}

?>