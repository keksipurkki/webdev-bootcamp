<?php

$countries = require('countries.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Countries in a grid</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="main.css">
</head>

<body id="home">

    <div class="wrapper"> 
       <ul class="grid">
  <?php 
        foreach ($countries as $countryCode => $value) {
          country($countryCode, $value);
        }
   ?>
       <ul>
    </div>
</body>
</html>
