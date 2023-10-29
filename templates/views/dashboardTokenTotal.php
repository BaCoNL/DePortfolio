<?php
include '../../app/config.php';
include_once '../../app/functions/convertToDecimal.php';

$address = $_GET['address'];?>
<dt class="text-sm font-medium leading-6 text-gray-500">Tokens</dt>
<? // get tokens that user holds
$tokens = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/tokens/' . $address . '?limit=100?api-key=' . $deCommasApiKey . ''));
$countTokens = count($tokens->result);
if ($countTokens === 100) {
  $countTokens = '100+';
}
?>
<dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900"><?= $countTokens; ?></dd>