<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include '../../app/functions/blockchainIcon.php';

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

if (isset($_GET['address'])) {
  $address = $_GET['address'];
} else {
  $address = false;
}

$transaction = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transaction/' . $blockchain . '/' . $hash . '?api-key=' . $deCommasApiKey . ''));
$transaction = $transaction->result;
?>

<div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
  <img src="<? echo blockchainIcon($transaction->chain_name); ?>" alt="mainnet"
       class="h-12 w-12 p-2 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
  <div class="text-sm font-medium leading-6 text-gray-900"><?= $transaction->chain_name; ?></div>

</div>
<div class="grid grid-cols-12 gap-5 p-4">
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
    <?= $transaction->status === false ? '<span class="text-red-500">Failed</span>' : '<span class="text-green-500">Success</span>';
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
        document.getElementById("time-<?= $count; ?>").textContent = moment.unix(<?= $transaction->block_timestamp; ?>).format('YYYY-MM-DD HH:mm:ss');
    </script>
  </div>
  <div class="col-span-12 border-t border-gray-200"></div>
  <div class="col-span-3">
    From:
  </div>
  <div class="col-span-9">
    <?= $transaction->from_address; ?>
  </div>
  <div class="col-span-3">
    To:
  </div>
  <div class="col-span-9">
    <?= $transaction->to_address; ?>
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
    Method:
  </div>
  <div class="col-span-9">
    <?php
    // Remove every character after ( in function_name
    echo $transaction->method;
    ?>
  </div>


</div>