<?php

require '../vendor/autoload.php';

use JwtRest\Database\Database;
echo Database::test();
echo PHP_EOL
?>

<?php

	$db = new Database();
	echo $db->connect();
?>

