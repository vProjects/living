<?php
/*
include('v-includes/Hashids.php');


$hashids = new Hashids\Hashids('sale',5);

for($i=5;$i<100;$i++){
	echo $i.'<br>';
 $hash = $hashids->encrypt($i);
	echo $hash;
echo '<br>';

$numbers = $hashids->decrypt($hash);

print_r($numbers);
echo '<br>';
}
*/


include('v-includes/lib/class.uniqueKey.php');

$uniqueKey = new uniqueKey();

$uniqueKey->uniqueKeyGenerator();

?>