<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

error_reporting(E_ALL ^ E_DEPRECATED); ini_set("display_errors", 1);
header("Connection: keep-alive");
header("Keep-Alive: timeout=100, max=500");
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 320);

$home = "./";
$path = 'bkps/';
$dir = $home.$path;
if (!file_exists($dir))
    mkdir($dir);

$bkpdir = '../bkp'; // DIRETORIO QUE VAI FAZER BACKUP




$PDO_HOST = 'localhost';    // HOST
$PDO_DB = 'novo_guincho';   // NOME DO BANCO
$PDO_USER = 'root';         // USUARIO
$PDO_PASS = '140996';       // SENHA