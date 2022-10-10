<?php
require('config.php');





$uid = date("YmdHis");

$static = ($_GET['static'] ?? false) ? true : false;
$bkpname = ($static ? 'static' : 'db').'-'.$uid;



// echo 'cancelada';

// exit;

$e = array();

exec("tar czf static-".$uid.".tar.gz ".$bkpdir);

$e[] = shell_exec("mysqldump -u ".$PDO_USER." -p".$PDO_PASS." ".$PDO_DB." > ".$bkpname.".sql");
exec("tar czf ".$bkpname.".tar.gz ".$bkpname.".sql");

unlink($bkpname.'.sql');

rename('static-'.$uid.'.tar.gz', $dir.'static-'.$uid.'.tar.gz');
rename($bkpname.'.tar.gz', $dir.''.$bkpname.'.tar.gz');



echo 'Backup criado com sucesso!



<a href="./ver.php">Ver backups</a>

';

// $e = array_filter($e);
if (count($e)){
    echo '
'.implode('
', $e);
}

exit;