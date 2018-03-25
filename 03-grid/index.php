<?php

require_once("functions.php");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (is_country($path)) {

  $countryCode = trim($path, "/");
  (require_once("country.php"))($countryCode, $countries[$countryCode]);

} else if (is_home($path)) {

  (require_once("home.php"))($countries);

} else {

  require_once("404.php");

}
