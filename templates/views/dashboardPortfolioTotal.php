<?php
include '../../app/config.php';
include_once '../../app/functions/convertToDecimal.php';

$address = $_GET['address'];
// get coins from the api
$coins = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/coins/' . $address . '?&api-key=' . $deCommasApiKey . ''));
foreach ($coins->result as $coin):
  $amount += (convertToDecimal($coin->amount, $coin->decimals) * $coin->actual_price);
endforeach;

// get tokens from the api
$erc20Coins = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/tokens/' . $address . '?limit=100&networks=mainnet,arbitrum,avalanche,optimism,bsc,fantom,gnosis,polygon,base,opbnb,linea&api-key=' . $deCommasApiKey . ''));
foreach ($erc20Coins->result as $erc20Coin):
  $amount += (convertToDecimal($erc20Coin->amount, $erc20Coin->decimals) * $erc20Coin->actual_price);
endforeach;
?>
<dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">$ <?= number_format($amount, 2); ?></dd>
