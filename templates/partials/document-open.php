<?php
// include config file
include 'app/config.php';

// get address form the url
$address = $_GET['address'];
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- load momentjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
  <!-- load alpine js -->
  <!--  <script src="//unpkg.com/alpinejs" defer></script>-->
  <!-- Adding HTMX  -->
  <script src="https://unpkg.com/htmx.org@1.9.6"></script>
  <link rel="icon" type="image/png" sizes="254x254" href="assets/img/favicon.png">


  <title>De Portfolio</title>
</head>