<?php include 'header.php';
// check if user has set an address else show wallet connect
if ($address):
  ?>

  <main>
    <div class="relative isolate overflow-hidden pt-16">
      <!-- Secondary navigation -->
      <? /*
    <header class="pb-4 pt-6 sm:pb-6">
      <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
        <h1 class="text-base font-semibold leading-7 text-gray-900">Cashflow</h1>
        <div class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
          <a href="#" class="text-indigo-600">Last 7 days</a>
          <a href="#" class="text-gray-700">Last 30 days</a>
          <a href="#" class="text-gray-700">All-time</a>
        </div>
        <a href="#" class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg class="-ml-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" />
          </svg>
          New invoice
        </a>
      </div>
    </header>
    */ ?>
      <!-- Stats -->
      <? // get data for stats
      $transactions = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transactions/' . $address . '?limit=100?api-key=' . $deCommasApiKey . ''));
      $countTransactions = count($transactions->result);
      if ($countTransactions === 100) {
        $countTransactions = '100+';
      }

      $nftData = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/nfts/' . $address . '?limit=100?api-key=' . $deCommasApiKey . ''));
      $countNfts = count($nftData->result);
      if ($countNfts === 100) {
        $countNfts = '100+';
      }
      ?>

      <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
        <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">

          <div
              class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 lg:border-l">
            <dt class="text-sm font-medium leading-6 text-gray-500">Portfolio balance</dt>
            <div>
              <div
                  hx-get="templates/views/dashboardPortfolioTotal.php?address=<?= $address; ?>&blockchain=<?= $blockchain->chain_name; ?>"
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
            </div>
          </div>
          <div
              class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
            <dt class="text-sm font-medium leading-6 text-gray-500">Expenses</dt>
            <dd class="text-xs font-medium text-rose-600">+10.18%</dd>
            <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">$30,156.00</dd>
          </div>
          <div
              class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
            <dt class="text-sm font-medium leading-6 text-gray-500">Transaction Count</dt>
            <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900"><?= $countTransactions; ?></dd>
          </div>
          <div
              class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
            <dt class="text-sm font-medium leading-6 text-gray-500">NFT Count</dt>
            <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900"><?= $countNfts; ?></dd>
          </div>
        </dl>
      </div>

      <div
          class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50"
          aria-hidden="true">
        <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]"
             style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
      </div>
    </div>

    <div class="space-y-16 py-16 xl:space-y-20">

      <!-- Recent client list-->
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
          <div class="flex items-center justify-between">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Assets Per Blockchain</h2>

          </div>
          <ul role="list" class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
            <? // get blockchains that hold assets
            $blockchains = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/coins/' . $address . '?api-key=' . $deCommasApiKey . ''));
            foreach ($blockchains->result as $blockchain): ?>
              <li class="overflow-hidden rounded-xl border border-gray-200">
                <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                  <? if ($blockchain->chain_name === 'optimism'): ?>
                    <img src="https://assets.coingecko.com/coins/images/25244/standard/Optimism.png"
                         alt="<?= $blockchain->chain_name; ?>"
                         class="h-12 w-12 p-2 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
                  <? else: ?>
                    <img src="<?= $blockchain->logo_url; ?>" alt="<?= $blockchain->chain_name; ?>"
                         class="h-12 w-12 p-2 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
                  <? endif; ?>
                  <div
                      class="text-sm font-medium leading-6 text-gray-900"><?= ucfirst($blockchain->chain_name); ?></div>


                </div>
                <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                  <div class="flex justify-between gap-x-4 py-3">
                    <dt class="text-gray-500">Last transaction</dt>
                    <dd class="text-gray-700">
                      <div
                          hx-get="templates/views/assetsPerBlockchainLastTransactions.php?limit=5&address=<?= $address; ?>&blockchain=<?= $blockchain->chain_name; ?>"
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
                    </dd>
                  </div>
                  <div class="flex justify-between gap-x-4 py-3">
                    <dt class="text-gray-500">Amount</dt>
                    <dd class="flex items-start gap-x-2">
                      <div
                          hx-get="templates/views/assetsPerBlockchainTotalAssetsUsd.php?limit=5&address=<?= $address; ?>&blockchain=<?= $blockchain->chain_name; ?>"
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
                    </dd>
                  </div>
                </dl>
              </li>
            <? endforeach; ?>
          </ul>
        </div>
      </div>

      <!-- Recent activity table -->
      <div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Recent
            Transactions</h2>
        </div>
        <div class="mt-6 overflow-hidden border-t border-gray-100">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
              <div hx-get="templates/views/tokenTransactions.php?limit=5&address=<?= $address; ?>"
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
              <a href="transactions.php?address=<?= $address; ?>"
                 class="text-sm font-semibold leading-6 text-indigo-600 hover:text-indigo-500 float-right">
                View all
              </a>
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
        <div class="col-span-12 text-center">
          <input type="button"
                 class="mt-5 rounded-md bg-orange-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
                 value="Connect Wallet" onclick="connect();">
          <div id="account" class="py-3">
          </div>
        </div>
      </div>
    </div>
  </main>
<?php endif; ?>


<?php include 'footer.php'; ?>