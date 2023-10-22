<?php
// get variables from the url
include '../../app/config.php';

$limit = $_GET['limit'];
$address = $_GET['address'];
?>
<table class="w-full text-left">
  <thead class="sr-only">
  <tr>
    <th>Amount</th>
    <th class="hidden sm:table-cell">Blockchain</th>
    <th>More details</th>
  </tr>
  </thead>
  <tbody>
  <tr class="text-sm leading-6 text-gray-900">
    <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
      <time datetime="2023-03-22">Transactions</time>
      <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
        Method
      </div>
      <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
    </th>
  </tr>
  <? // Load transactions of user?>
  <?
  sleep(rand(1, 2));
  $transactions = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transactions/' . $address . '?api-key=' . $deCommasApiKey . ''));
  $transactionCount = 0;
  foreach ($transactions->result as $transaction):
    if ($transactionCount < $limit):
      ?>
      <tr>
        <td class="relative py-5 pr-6">
          <div class="flex gap-x-6">
            <? if ($transaction->to_address === $address): ?>
              <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20"
                   fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.75a.75.75 0 001.5 0V8.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L6.2 9.74a.75.75 0 101.1 1.02l1.95-2.1v4.59z"
                      clip-rule="evenodd"/>
              </svg>
            <? else: ?>
              <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20"
                   fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v4.59L7.3 9.24a.75.75 0 00-1.1 1.02l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75z"
                      clip-rule="evenodd"></path>
              </svg>
            <? endif; ?>
            <div class="flex-auto">
              <div class="flex items-start gap-x-3">
                <div class="text-sm font-medium leading-6 text-gray-900">$7,600.00
                  USD <?= $transaction->value; ?></div>
                <? if ($transaction->status === true): ?>
                  <div
                    class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                    Success
                  </div>
                <? else: ?>
                  <div
                    class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                    Failed
                  </div>
                <? endif; ?>
              </div>
              <div class="mt-1 text-xs leading-5 text-gray-500"><?= $transaction->method; ?></div>
            </div>
          </div>
          <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
          <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
        </td>
        <td class="hidden py-5 pr-6 sm:table-cell">
          <div class="text-sm leading-6 text-gray-900">Reform</div>
          <div class="mt-1 text-xs leading-5 text-gray-500">Website redesign</div>
        </td>
        <td class="py-5 text-right">
          <div class="flex justify-end">
            <a href="#"
               class="text-sm font-medium leading-6 text-indigo-600 hover:text-indigo-500">View<span
                class="hidden sm:inline"> transaction</span><span
                class="sr-only">, invoice #00012, Reform</span></a>
          </div>
          <div class="mt-1 text-xs leading-5 text-gray-500">Invoice <span
              class="text-gray-900">#00012</span></div>
        </td>
      </tr>
      <?
      $transactionCount++;
    endif;
  endforeach; ?>
  </tbody>
</table>