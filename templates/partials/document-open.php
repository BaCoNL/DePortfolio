<?php
// include config file
include 'app/config.php';

// get address form the url
$address = $_GET['address'];
?>
<!doctype html>
<html lang="en-US">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-0PQGZ3CM4K"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-0PQGZ3CM4K');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- load momentjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/4.2.1/web3.min.js"></script>
  <script src="https://c0f4f41c-2f55-4863-921b-sdk-docs.github.io/cdn/metamask-sdk.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>

  <!-- load alpine js -->
  <!--  <script src="//unpkg.com/alpinejs" defer></script>-->
  <!-- Adding HTMX  -->
  <script src="https://unpkg.com/htmx.org@1.9.6"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
  <script src="assets/js/metamaskSDK.js"></script>
  <link rel="icon" type="image/png" sizes="254x254" href="assets/img/favicon.png">


  <title>De Portfolio</title>



</head>

<body class="bg-white">