<?php
function convertToDecimal($rawAmount, $decimals) {
  $amount = $rawAmount / pow(10, $decimals);
  return $amount;
}