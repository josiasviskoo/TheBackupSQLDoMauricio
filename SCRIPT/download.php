<?php
require('config.php');

$file = $_GET['file'] ?? '';

if ($file == ''){
    echo 'Falta arquivo!';
    exit;
}
if (strpos($file, '..') !== false)
    exit;

$local_file = $dir.$file;

// set the download rate limit (=> 20,5 kb/s)
$download_rate = 20.5;
if(file_exists($local_file) && is_file($local_file)){
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$file);

    flush();
    $file = fopen($local_file, "r");
    while(!feof($file))
    {
        // send the current file part to the browser
        print fread($file, round($download_rate * 1024));
        // flush the content to the browser
        flush();
        // sleep one second
        // sleep(1);
    }
    fclose($file);
}else{
    echo 'Arquivo inexistente!';

    echo '</br></br><a href="./ver.php">VOLTAR</a>';
}


exit;