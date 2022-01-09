<?php

$countries = require("countries.php");

function next_country($countryCode) {
  global $countries;
  $countryCodes = array_keys($countries);
  $index = array_search($countryCode, $countryCodes) + 1;
  return isset($countryCodes[$index]) ? $countryCodes[$index] : null;
}

function previous_country($countryCode) {
  global $countries;
  $countryCodes = array_keys($countries);
  $index = array_search($countryCode, $countryCodes) - 1;
  return isset($countryCodes[$index]) ? $countryCodes[$index] : null;
}

function country($countryCode, $value) {
  list($flagEmoji, $name) = $value;
?>
  <li class="grid-item country" aria-label="<?= $countryCode ?>">
      <a href="<?= "/{$countryCode}" ?>" title="<?= $name ?>">
        <?= implode(array_map("mb_chr", $flagEmoji)) ?>
      </a>
  </li>
<?php
}

function is_home($path) {
  return $path === "/";
}

function is_country($path) {
  global $countries;
  return isset($countries[trim($path, "/")]);
}
