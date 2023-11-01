<?php include 'header.php';
if ($address):
?>

  <main>

    <div class="space-y-16 py-20 xl:space-y-20">
      <!-- Recent activity table -->
      <div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Recent
            NFT's</h2>
        </div>
        <div class="mt-6 overflow-hidden border-t border-gray-100">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
              <div
                  class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <? $nfts = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/nfts/' . $address . '?api-key=' . $deCommasApiKey . ''));
                foreach ($nfts->result as $nft):

                ?>


                <? $nftDetails = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/nft_metadata/'. $nft->chain_name .'/'. $nft->contract_address .'/'. $nft->token_id .'?api-key=' . $deCommasApiKey . ''));
                  $nftDetails = $nftDetails->result;
                  ?>
                  <div hx-get="templates/views/nftDetails.php?blockchain=<?= $nft->chain_name; ?>&nft=<?= $nft->contract_address; ?>&tokenID=<?= $nft->token_id; ?>"
                       hx-trigger="load">
                    <div class="htmx-indicator">
                      <svg class="animate-spin h-3 w-3 mr-3 inline" xmlns="http://www.w3.org/2000/svg" fill="none"
                           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                      </svg>
                      Processing...
                    </div>
                  </div>
                <?
                  $nftDetails = null;

                endforeach; ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php else: ?>
  <main>
    <div class="relative isolate overflow-hidden pt-16">
      <div class="mx-auto grid max-w-7xl grid-cols-12  lg:px-2 xl:px-0">
        <div class="col-span-12 text-center pt-16">
          <div class="font-semibold text-3xl">Connect your wallet</div>
        </div>
        <div class="col-span-12 text-center" id="">
          <div id="dashboardLink" class="py-3">
            <input type="button"
                   class="mt-5 rounded-md bg-orange-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
                   value="Connect Wallet" onclick="connect();">
          </div>
          <div id="account" class="py-3">
          </div>
        </div>

      </div>
    </div>
  </main>
<?php endif; ?>

<?php include 'footer.php'; ?>