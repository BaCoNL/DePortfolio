<?php
include '../../app/config.php';

$blockchain = $_GET['blockchain'];
$address = $_GET['address'];
$transactions = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transactions/' . $address . '?networks='. $blockchain . '&api-key=' . $deCommasApiKey . ''));
?>
<div class="font-medium text-gray-900">$2,000.00</div>
