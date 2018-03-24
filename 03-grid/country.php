<?php

$countries = require('countries.php');

return function($countryCode, $values) use($countries) {

  list($flagEmoji, $name) = $values; 

  // Programming error
  if (!isset($countries[$countryCode])) {
    throw new Exception("No such country ".$countryCode);
  }

  $next = next_country($countryCode);
  $prev = previous_country($countryCode);

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

  <body id="country">
      <a class="home-link" href="/">Home</a>
      <div class="wrapper"> 
          <ul>
            <?php country($countryCode, $values) ?>
          </ul>
          <h2><?= $name ?></h2>
          <div class="grid nav-links">
            <a href="/<?= $prev ?>" class="grid-item">
                 <small>◀&nbsp;<?= $countries[$prev][1] ?></small>
            </a>
            <a href="/<?= $next ?>" class="grid-item">
              <small><?= $countries[$next][1]?>&nbsp;▶</small>
            </a>
          </div>
      </div>
  </body>
  </html>

<?php
};
