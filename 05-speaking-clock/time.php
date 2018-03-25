<?php

$numerals = [
  1 => "one",
  2 => "two",
  3 => "three",
  4 => "four",
  5 => "five",
  6 => "six",
  7 => "seven",
  8 => "eight",
  9 => "nine",
  10 => "ten",
  11 => "eleven",
  12 => "twelve",
  13 => "thirteen",
  14 => "fourteen",
  15 => "fifteen",
  16 => "sixteen",
  17 => "seventeen",
  18 => "eighteen",
  19 => "nineteen",
  20 => "twenty",
];

function to_clock_numeral($number) {
  global $numerals;

  if ($number <= 0 || $number >= 30) {
    throw new RuntimeException("Expected a positive number below 30");
  }
  return $number <= 20 ? [$numerals[$number]] : ["twenty", $numerals[$number - 20]];
}

function to_path($word) {
  return sprintf("file %s/words/%s.wav", __DIR__, escapeshellarg($word));
}

function get_sentence($date) {

  $hour = (int) $date->format("h");
  $minutes = (int) $date->format("i");

  $sentence = ["time", "is"];

  if ($minutes == 0) {

    $sentence = array_merge($sentence, to_clock_numeral($hour));
    array_push($sentence, "o'clock", "sharp");
    return $sentence;
  
  } else if ($minutes == 30) {

    $sentence = array_merge($sentence, ["half", "past"]);

  } else if ($minutes < 30) {

    $sentence = array_merge($sentence, to_clock_numeral($minutes));
    array_push($sentence, "minutes", "past");

  } else {

    $sentence = array_merge($sentence, to_clock_numeral(60 - $minutes));
    $hour += 1;
    array_push($sentence, "minutes", "to");

  }

  $sentence = array_merge($sentence, to_clock_numeral($hour));
  return $sentence;

}

if (isset($_GET["tz"]) and in_array($_GET["tz"], timezone_identifiers_list())) {
  date_default_timezone_set($_GET["tz"]);
} else {
  date_default_timezone_set("Europe/Helsinki");
}

$date = php_sapi_name() == "cli" ? $argv[1] : "now";

$sentence = get_sentence(new DateTime($date));
$tmpfile = tmpfile();
$path = stream_get_meta_data($tmpfile)['uri'];
$tokens = array_map(to_path, $sentence);

file_put_contents($path, implode("\n", $tokens));
header("Content-Type: audio/mpeg");
header("Cache-Control: no-cache");
passthru("ffmpeg -hide_banner -loglevel panic -f concat -safe 0 -i $path -f mp3 pipe:1");
