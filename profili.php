<?php // Example 08: profile.php
require_once 'header.php';
session_start();
if (!$loggedin) die("</div></body></html>");

echo "<h3>Profili juaj</h3>";

$result = queryMysql("SELECT user_role FROM user WHERE user_email='$user'");
$rowCount = $result->num_rows;
if ($rowCount == 0)
{
    $error = "Invalid login attempt";
}
$roli="";
if ($rowCount == 1)
{
    $roli = $_SESSION['roli'] = $result->fetch_assoc()["user_role"];
}

if(strtolower($roli)=='sekretar'){
    include_once 'sek_header.php';

}

?>
