<?php
include '../../app/config.php';

$blockchain = $_GET['blockchain'];
$address = $_GET['address'];
sleep(rand(0, 3));

$transactions = json_decode(file_get_contents('https://datalayer.decommas.net/datalayer/api/v1/transactions/' . $address . '?networks='. $blockchain . '&api-key=' . $deCommasApiKey . ''));
?>
<time id="time-<?= $transactions->result[0]->block_timestamp ?>"></time>
<script type="text/javascript">
    document.getElementById("time-<?= $transactions->result[0]->block_timestamp ?>").textContent = moment.unix(<?= $transactions->result[0]->block_timestamp ?>).format('YYYY-MM-DD HH:mm:ss');
</script>