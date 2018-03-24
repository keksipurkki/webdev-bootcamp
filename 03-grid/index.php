<?php

require_once("functions.php");

$countries = require('countries.php');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function is_home($path) {
  return $path === "/";
}

$country = trim($path, "/");

if ($countries[$country]) {

  (require_once("country.php"))($country, $countries[$country]);

} else if (is_home($path)) {

  require_once("home.php");

} else {

  require_once("404.php");

}
