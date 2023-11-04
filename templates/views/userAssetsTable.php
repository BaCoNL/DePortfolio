<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../../app/functions/convertToDecimal.php';
include '../../app/config.php';

$address = $_GET['address'];
$isVerified = $_GET['verified'];
if ($isVerified === 'true'):
  $isVerified = true;
else:
  $isVerified = false;
endif;

if ($address):
// load all tokens of user
  $tokens = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/tokens/' . $address . '?limit=100?api-key=' . $deCommasApiKey . ''));
  $countTokens = count($tokens->result);
  if ($countTokens === 100) {
    $countTokens = '100+';
  }
  $blockchains = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/coins/' . $address . '?api-key=' . $deCommasApiKey . ''));
endif;
?>

<table class="min-w-full divide-y divide-gray-300">
  <thead>
  <tr>
    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Name
    </th>
    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Blockchain</th>
    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">USD Price</th>
    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">USD Value</th>

  </tr>
  </thead>
  <tbody class="bg-white">
<? foreach ($blockchains->result as $blockchain):
if ($isVerified === true):?>
  <tr class="even:bg-gray-50">
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
      <? if ($blockchain->logo_url): ?>
        <img src="<?= $blockchain->logo_url; ?>" class="w-8 inline" alt="<?= $blockchain->name; ?>">
      <? else: ?>
        <img src="assets/img/unknown-token.jpeg" alt="Unknown Token"
             class="w-8 inline">
      <? endif; ?>
      <?= $blockchain->name; ?>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $blockchain->chain_name; ?></td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <?
      if ($blockchain->actual_price):
        echo $blockchain->actual_price;
      else:
        echo 'Unknown';
      endif;
      ?>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= convertToDecimal($blockchain->amount, '18'); ?></td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">$
      <? if ($blockchain->actual_price):
        echo round(convertToDecimal($blockchain->amount, '18') * $blockchain->actual_price, 2);
      else:
        echo 'Unknown';
      endif; ?>
    </td>


  </tr>

<? endif;
endforeach; ?>
<?
foreach ($tokens->result as $token):

  if ($token->is_verified === $isVerified): ?>

    <tr class="even:bg-gray-50">
      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
        <? if ($token->logo_url): ?>
          <img src="<?= $token->logo_url; ?>" class="w-8 inline" alt="<?= $token->name; ?>">
        <? else: ?>
          <img src="assets/img/unknown-token.jpeg" alt="Unknown Token"
               class="w-8 inline">
        <? endif; ?>
        <?= $token->name; ?>
      </td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $token->chain_name; ?></td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <?
        if ($token->actual_price):
          echo $token->actual_price;
        else:
          echo 'Unknown';
        endif;
        ?>
      </td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= sprintf('%.8f', floatval(convertToDecimal($token->amount, $token->decimals))); ?></td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">$
        <? if ($token->actual_price):

          $usdAmount = round(sprintf('%.8f', floatval(convertToDecimal($token->amount, $token->decimals) * $token->actual_price)), 2);
          if ($usdAmount > 0):
            echo $usdAmount;
          else:
            echo '0.00';
          endif;

        else:
          echo 'Unknown';
        endif; ?>
      </td>


    </tr>
  <?
  endif;
endforeach;
?>
  </tbody>
</table>