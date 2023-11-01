<?php
include '../../app/config.php';
include '../../app/functions/blockchainIcon.php';

if (isset($_GET['blockchain'])) {
  $blockchain = $_GET['blockchain'];
} else {
  $blockchain = false;
}

if (isset($_GET['nft'])) {
  $nft = $_GET['nft'];
} else {
  $nft = false;
}
if (isset($_GET['tokenID'])) {
  $tokenID = $_GET['tokenID'];
} else {
  $tokenID = false;
}
//sleep(rand(1, 20));

$nftDetails = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/nft_metadata/' . $blockchain . '/' . $nft . '/' . $tokenID . '?api-key=' . $deCommasApiKey . ''));
$nftDetails = $nftDetails->result;
if ($nftDetails->image_url === null) {
  $nftDetails->image_url = 'assets/img/unknown-token.jpeg';
}
?>
<div
    class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-100 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
  <img
      src="<?= $nftDetails->image_url; ?>"
      alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
  <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
  <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

  <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
    <div class="-ml-4 flex items-center gap-x-4">
      <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
        <circle cx="1" cy="1" r="1"/>
      </svg>
      <div class="flex gap-x-2.5">
        <img
            src="<?= blockchainIcon($blockchain); ?>"
            alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">
        <?= $blockchain; ?>
      </div>
    </div>
  </div>
  <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
    <span class="absolute inset-0"></span>
    <? if($nftDetails->name){
      echo $nftDetails->name;
    } else {
      echo 'Unknown';
    } ?>

  </h3>
</div>
