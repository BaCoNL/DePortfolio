<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// get variables from the url
include '../../app/config.php';
if (isset($_GET['hash'])) {
  $hash = $_GET['hash'];
} else {
  $hash = false;
}

if (isset($_GET['blockchain'])) {
  $blockchain = $_GET['blockchain'];
} else {
  $blockchain = false;
}
$transaction = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transaction/' . $blockchain . '/' . $hash . '?api-key=' . $deCommasApiKey . ''));
$transaction = $transaction->result;
?>

<div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
  <img src="https://assets.coingecko.com/coins/images/279/large/ethereum.png?1595348880" alt="mainnet"
       class="h-12 w-12 p-2 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
  <div class="text-sm font-medium leading-6 text-gray-900"><?= $transaction->chain_name; ?></div>

</div>
<div class="grid grid-cols-12 gap-5 p-4">
  <?
  //$transaction = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transaction/' . $blockchain . '/' . $hash . '?api-key=' . $deCommasApiKey . ''));

  //var_dump($transaction);

  //$transaction = $transaction->result;
  ?>
  <div class="col-span-3">
    Transaction Hash:
  </div>
  <div class="col-span-9">
    <?= $_GET['hash']; ?>
  </div>
  <div class="col-span-3">
    Transaction Status:
  </div>
  <div class="col-span-9">
    <?= $transaction->is_error === 0 ? '<span class="text-red-500">No</span>' : '<span class="text-green-500">Yes</span>';
    ?>
  </div>
  <div class="col-span-3">
    Block:
  </div>
  <div class="col-span-9">
    <?= $transaction->block_number; ?>
  </div>
  <div class="col-span-3">
    Timestamp:
  </div>
  <div class="col-span-9">
    <span id="time-<?= $count; ?>"></span>

    <script type="text/javascript">
        document.getElementById("time-<?= $count; ?>").textContent = moment.unix(<?= $transaction->time_stamp; ?>).format('YYYY-MM-DD HH:mm:ss');
    </script>
  </div>
  <div class="col-span-12 border-t border-gray-200"></div>
  <div class="col-span-3">
    From:
  </div>
  <div class="col-span-9">
    <a href="address.php?address=<?= $transaction->from; ?>">
      <?= $transaction->from;
      if ($transaction->from === '0x794a61358d6845594f94dc1db02a252b5b4814ad') {
        echo ' (Aave: Pool V3)';
      } ?>
    </a>

  </div>
  <div class="col-span-3">
    To:
  </div>
  <div class="col-span-9">
    <a href="address.php?address=<?= $transaction->to; ?>">
      <?= $transaction->to;
      if ($transaction->to === '0x794a61358d6845594f94dc1db02a252b5b4814ad') {
        echo ' (Aave: Pool V3)';
      }
      ?>
    </a>
  </div>
  <div class="col-span-12 border-t border-gray-200"></div>

  <div class="col-span-3">
    Value:
  </div>
  <div class="col-span-9">
    <?= $transaction->value; ?>
  </div>
  <div class="col-span-3">
    Gas Used:
  </div>
  <div class="col-span-9">
    <?= $transaction->gas_used; ?>
  </div>
  <div class="col-span-3">
    Gas Price:
  </div>
  <div class="col-span-9">
    <?= $transaction->gas_price; ?>
  </div>
  <div class="col-span-3">
    Function Name:
  </div>
  <div class="col-span-9">
    <?php
    // Remove every character after ( in function_name
    echo substr($transaction->function_name, 0, strpos($transaction->function_name, '('));
    ?>
  </div>

  <div class="col-span-12 border-t border-gray-200">
    ERC-20 Tokens Transferred:
  </div>
  <?
  $transactionDetailDetails = json_decode(file_get_contents('https://api.mosaic.fun/api/aaveTransactionsDetails?transactionHash=' . $_GET['hash']));
  foreach (array_reverse($transactionDetailDetails) as $transactionDetail) : ?>
    <div class="col-span-4 text-sm">
      From: <?= $transactionDetail->from; ?>
    </div>
    <div class="col-span-4 text-sm">
      To: <?= $transactionDetail->to; ?>
    </div>
    <div class="col-span-4 text-sm">
      Value: <?
      echo $transactionDetail->value ?> <?= $transactionDetail->token_symbol; ?>
    </div>
  <? endforeach; ?>
</div>