<?php
include_once('Database.php');
include_once('paginator.class.php');

define('DB_NAME1', 'test');
define('DB_USER1', 'root');
define('DB_PASSWORD1', '');
define('DB_HOST1', 'localhost');

$dsn	= 	"mysql:dbname=".DB_NAME1.";host=".DB_HOST1."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, DB_USER1, DB_PASSWORD1);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);
$pages	=	new Paginator();
?>