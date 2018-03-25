#!/bin/bash

function usage() {
  echo "Usage: $(basename $0) PROJECT_NAME"
}

function index_html() {
  local project=$1
  cat > $project/index.html << EOF
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title></title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//meyerweb.com/eric/tools/css/reset/reset.css">
        <link rel="stylesheet" href="main.css">
</head>

<body id="home">
        <div class="wrapper">
            <h1>Ciao!</h1>
        </div>
</body>
</html>
EOF
}

function main_css() {
  local project=$1
  cat > $project/main.css << EOF

body {
  /* http://blog.purecss.io/post/60789414532/how-we-improved-grids-in-pure-030 */
  font-family: FreeSans, Arimo, 'Droid Sans', Helvetica, Arial, sans-serif;
}

.wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

a {
  text-decoration: none;
  color: currentColor;
}

a:visited {
  text-decoration: none;
  color: currentColor;
}

h1 {
  font-size: 4em;
}

h2 {
  font-size: 1.5em;
}

h1, h2 {
  font-weight: bold;
}

h1, h2, h3 {
  margin: calc(2rem - .14285em) 0 1rem;
}

EOF

}

function launch() {
  local project=$1
  local host=${2:-localhost}
  local port=${3:-8080}
  ( sleep 2 && open "http://$host:$port" ) &
  exec php -S "$host:$port" -t "$project"
}

project=$1

if [[ -z "$project" ]]; then 
  usage
  exit
fi

if [[ ! -d "$project" ]]; then
  mkdir -p "$project"
  index_html "$project"
  main_css "$project"
fi

launch "$project"
