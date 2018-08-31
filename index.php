<?
$uri = explode('/', $_SERVER['REQUEST_URI']);
$view = "views/";

/* ------------------------------------------------------
        handle url:
        + /dev > gyroscope (plus hide the clock)
        + /thx > download
        + everything else > object-fullscreen
------------------------------------------------------ */

// show the things
require_once("views/head.php");

if ($uri[1] == "program" && $uri[2])
  require_once("views/program.php");
else if ($uri[1] == "program")
  require_once("views/programming.php");
else if ($uri[1])
  require_once("views/main.php");
else
  require_once("views/home.php");

require_once("views/logo.php");
require_once("views/foot.php");
?>
