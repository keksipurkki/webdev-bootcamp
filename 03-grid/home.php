<?php

return function ($countries) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta content="HTML Tidy for HTML5 for Apple macOS version 5.6.0" name="generator">
      <meta charset="utf-8">
      <title>Countries in a grid</title>
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
      <link href="reset.css" rel="stylesheet">
      <link href="main.css" rel="stylesheet">
    </head>
    <body id="home">
      <div class="wrapper">
        <ul class="grid">
<?php
  foreach ($countries as $countryCode => $value) {
    country($countryCode, $value);
  }
?>
        </ul>
      </div>
    </body>
    </html>
<?php
};
