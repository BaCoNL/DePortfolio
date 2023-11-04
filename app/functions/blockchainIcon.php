<?php

function blockchainIcon($blockchain_name)
{


  if ($blockchain_name === 'mainnet') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/279/large/ethereum.png?1595348880';
  } else if ($blockchain_name === 'bsc') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/825/large/binance-coin-logo.png?1547034615';
  } else if ($blockchain_name === 'polygon') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/4713/large/matic-token-icon.png?1624446912';
  } else if ($blockchain_name === 'fantom') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/4001/large/Fantom_round.png?166965234';
  } else if ($blockchain_name === 'avax') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/12559/standard/Avalanche_Circle_RedWhite_Trans.png?1696512369';
  } else if ($blockchain_name === 'heco') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/12467/large/HT.png?1599625397';
  } else if ($blockchain_name === 'harmony') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/4344/large/Y88JAze.png?1608111978';
  } else if ($blockchain_name === 'arbitrum') {
    $blochain_icon = 'https://cryptologos.cc/logos/arbitrum-arb-logo.png?v=026';
  } else if ($blockchain_name === 'optimism') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/25244/standard/Optimism.png?1626349505';
  } else if ($blockchain_name === 'xdai') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/12883/large/xdai.png?1621698381';
  } else if ($blockchain_name === 'celo') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/11090/large/Celo.png?1593028102';
  } else if ($blockchain_name === 'moonriver') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/14482/large/moonriver.png?1628884299';
  } else if ($blockchain_name === 'avalanche') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/12559/standard/Avalanche_Circle_RedWhite_Trans.png?1696512369';
  } else if ($blockchain_name === 'kcc') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/14325/large/kcc.png?1615387161';
  } else if ($blockchain_name === 'palm') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/14483/large/palm.png?1628884301';
  } else if ($blockchain_name === 'opera') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/12884/large/opera.png?1621698382';
  } else if ($blockchain_name === 'arbitrum_nova') {
    $blochain_icon = 'https://cryptologos.cc/logos/arbitrum-arb-logo.png';
  } else if ($blockchain_name === 'gnosis') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/11062/large/Identity-Primary-DarkBG.png?1638372986';
  } else if ($blockchain_name === 'polygon_zkevm') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/4713/large/matic-token-icon.png?1624446912';
  } else if ($blockchain_name === 'base') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/279/large/ethereum.png?1595348880';
  } else if ($blockchain_name === 'opbnb') {
    $blochain_icon = 'https://assets.coingecko.com/coins/images/825/large/bnb-icon2_2x.png?1644979850';
  } else if ($blockchain_name === 'linea') {
    $blochain_icon = 'https://icodrops.com/wp-content/uploads/2023/05/erDLnbwE_400x400-150x150.jpg';
  }


  return $blochain_icon;
}


