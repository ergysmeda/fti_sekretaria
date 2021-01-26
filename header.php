<?php
session_start();

echo <<<_INIT
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

_INIT;

$userstr = 'Miresevin i ftuari';
$randstr = substr(md5(rand()), 0, 7);
require_once 'functions.php';

if (isset($_SESSION['user']))
{
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "Logged in as: $user";
}
else $loggedin = FALSE;

echo <<<_MAIN
    <title>FTI: $userstr</title>
  </head>
  <body>
_MAIN;


?>
