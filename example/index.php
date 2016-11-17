<?php

require '../Geocoder.php';

$geocoder = new Geocoder();

for($i = 0 ; $i < 100 ; $i++) {
    $data = $geocoder->geocode(51.4440247, 5.4541339);
    print_r($data);
}

echo "\nThat's all folks";