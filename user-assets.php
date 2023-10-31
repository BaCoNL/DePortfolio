<?php include 'header.php';

include_once 'app/functions/convertToDecimal.php';

// load all tokens of user
$tokens = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/tokens/' . $address . '?limit=100?api-key=' . $deCommasApiKey . ''));
$countTokens = count($tokens->result);
if ($countTokens === 100) {
  $countTokens = '100+';
}


$blockchains = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/coins/' . $address . '?api-key=' . $deCommasApiKey . ''));
?>

  <main>

    <div class="space-y-16 py-20 xl:space-y-20">
      <!-- Recent activity table -->
      <div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">User
            Assets</h2>
        </div>
        <div class="mt-6 overflow-hidden border-t border-gray-100">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
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
                <? foreach ($blockchains->result as $blockchain): ?>
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
                        echo convertToDecimal($blockchain->amount, '18') * $blockchain->actual_price;
                      else:
                        echo 'Unknown';
                      endif; ?>
                    </td>


                  </tr>

                <? endforeach; ?>
                <?
                foreach ($tokens->result as $token):

                  if ($token->is_verified === true): ?>

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
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= sprintf('%.8f',floatval(convertToDecimal($token->amount, $token->decimals))); ?></td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">$
                        <? if ($token->actual_price):
                          echo sprintf('%.8f',floatval(convertToDecimal($token->amount, $token->decimals) * $token->actual_price));
                        else:
                          echo 'Unknown';
                        endif; ?>
                      </td>


                    </tr>
                  <?
                  endif;
                endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


<?php include 'footer.php'; ?>