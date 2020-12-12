<?php

function redirect_to($location) {
  return isset($location) ? header("Location: {$location}") : null;
}

?>
