<?php
$host='localhost';
$datebase='fti';
$user='root';
$password='';

$connection = new mysqli($host,$user,$password,$datebase);

if($connection->connect_error) die($connection->connect_error);

function queryMysql($query){
    global $connection;
    $result=$connection->query($query);
    return $result;
}

function destroySession(){
    $_SESSION=array();
    if(session_id()!=""||isset($COOKIE[session_name()])){
        setcookie(session_name().''.time()-2592000,'/');
    }
    session_destroy();

}
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sanitizeString($var){
    global $connection;
    $var=strip_tags($var);
    $var=htmlentities($var);
    $var=stripslashes($var);
    return $connection->real_escape_string($var);
}
function showProfile($user){
    $result=queryMysql("SELECT user_emri, user_mbiemri FROM user where user_id = $user");
    if($result->num_rows){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes('Personi qe kerkuat eshte:'.$row['user_emri']." ".$row['user_mbiemri']);
    }
}
function passwordify($pass){
    $salt1="sabn21sa";
    $salt2="23$2#";
    $pass=$salt1.$pass.$salt2;
    return md5($pass);
}
?>
