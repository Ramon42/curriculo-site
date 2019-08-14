<?php
function sanitize_unsafe($value) {
   $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
   $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
   return str_replace($search, $replace, $value);
}

function fromGet($param){
   if (isset($_GET[$param]))
      return sanitize_unsafe($_GET[$param]);
}

function fromPost($param){
    if (isset($_POST[$param])){
        return $_POST[$param];
    }
}

function toSession($key, $value){
  session_start();
  $_SESSION[$key] = $value;
}

function getUser(){
  session_start();
  if (!isset($_SESSION) ||!isset($_SESSION["autenticado"])){
    return null;
  }
  return $_SESSION["autenticado"];
}

function user_logged(){
  return;
}
function fromSession($param){
  $value = "";
  if (!isset($_SESSION))
    session_start();
  if (isset($_SESSION[$param])){
    $value = $_SESSION[$param];
    unset($_SESSION[$param]);
  }
  return $value;
}
?>
