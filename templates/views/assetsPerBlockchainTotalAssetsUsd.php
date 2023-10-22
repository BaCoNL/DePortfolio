<?php
include '../../app/config.php';
include_once '../../app/functions/convertToDecimal.php';

$blockchain = $_GET['blockchain'];
$address = $_GET['address'];

// get coins from the api
$coins = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/coins/' . $address . '?networks='. $blockchain . '&api-key=' . $deCommasApiKey . ''));
$amount = (convertToDecimal($coins->result[0]->amount, $coins->result[0]->decimals)* $coins->result[0]->actual_price);

// get tokens from the api
$erc20Coins = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/tokens/' . $address . '?networks='. $blockchain . '&api-key=' . $deCommasApiKey . ''));
foreach ($erc20Coins->result as $erc20Coin):
    $amount += (convertToDecimal($erc20Coin->amount, $erc20Coin->decimals) * $erc20Coin->actual_price);
endforeach;

?>
<div class="font-medium text-gray-900">$ <?= number_format($amount, 2); ?></div>
