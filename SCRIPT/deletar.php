<?php
require('config.php');

$file = $_GET['file'] ?? '';

if ($file == ''){
    echo 'Falta arquivo!';
    exit;
}
if (strpos($file, '..') !== false)
    exit;

echo 'DELETE '.$file.'?</br></br>';

$local_file = $dir.$file;
if(file_exists($local_file) && is_file($local_file)){
    if ($_GET['confirm'][2] ?? false){
        unlink($local_file);
        echo 'deletado!';
    }else{
        echo '<a href="./deletar.php?file='.$file.'&confirm=1">CONFIRMAR</a>';
    }
}


echo '</br></br><a href="./ver.php">VOLTAR</a>';


exit;