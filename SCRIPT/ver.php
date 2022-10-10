<?php
require('config.php');

echo 'Backup list: </br></br>';

$files = scandir($dir);

$r = '';
usort($files, function($a, $b){
    $a = implode('-',array_reverse(explode('-', $a)));
    $b = implode('-',array_reverse(explode('-', $b)));

    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
});
foreach ($files as $k => $v) {
    if ($v == '.') continue;
    if ($v == '..') continue;

    echo '<div><a href="./download.php?file='.$v.'">'.$v.'</a><a href="./deletar.php?file='.$v.'" style="color: #fff;margin-left: 10px;padding: 5px 5px;background: #f00;display: inline-block;">X</a></div>';
}

echo '<div><a href="./criar.php">Criar backup</a></div>';

exit;