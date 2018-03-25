<?php

function index_html($project) {

  ob_start(function($buffer) use ($project) {
    $fname = "index.html";
    file_put_contents("$project/$fname", $buffer);
    return;
  });

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>HTML5 boilerplate – all you really need…</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//meyerweb.com/eric/tools/css/reset/reset.css">
        <link rel="stylesheet" href="main.css">
</head>

<body id="home">
        <h1>Start editing me</h1>
</body>
</html>

<?php
  ob_get_clean();
}

function main_css($project) {
  ob_start(function($buffer) use ($project) {
    $fname = "main.css";
    file_put_contents("$project/$fname", $buffer);
    return;
  });
?>

/* The styles  */

<?php
  ob_get_clean();
}

function start($project, $host = "localhost", $port = 8080) {
  $sequence = [
    "php -S $host:$port -t $project & disown $!",
    "sleep 3",
    "open http://$host:$port"
  ];
  shell_exec(implode(" && ", $sequence));
}

/* Start */

$project = $argv[1];

if (!$project) {
  printf("%s PROJECT_NAME \n", basename($argv[0]));
  exit(1);
}

if (!file_exists($project)) {
  if (!mkdir($project)) exit(1);
  index_html($project);
  main_css($project);
}

start($project);
