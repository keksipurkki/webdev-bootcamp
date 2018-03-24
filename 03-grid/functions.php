<?php

$countries = require("countries.php");

function mb_chr($ord, $encoding = 'UTF-8') {
  if ($encoding === 'UCS-4BE') {
    return pack("N", $ord);
  } else {
    return mb_convert_encoding(mb_chr($ord, 'UCS-4BE'), $encoding, 'UCS-4BE');
  }
}

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
        <?= implode(array_map(mb_chr, $flagEmoji)) ?>
      </a>
  </li>
<?php
}


