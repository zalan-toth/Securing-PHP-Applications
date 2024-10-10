<?php
  if (isset($_COOKIE['userid'])) {
    $useridcookie = $_COOKIE['userid'];
    echo "The value of 'userid' cookie is ".$useridcookie;
  } else {
    echo "No cookie found. Creating one!";
    setcookie("userid", "zalantoth", time()+3600*24);
  }
?>
