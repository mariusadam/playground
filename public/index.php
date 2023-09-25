<?php

use App\Setup\Check;

echo sprintf('Reached index.php, path on disk is: %s', __FILE__);

$check = new Check();
echo $check->getMessage();