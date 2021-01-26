<?php // Example 02: header.php
require_once 'header.php';
if($_SESSION['roli']!= 'sekretar')
    exit;

require_once 'functions.php';
$randstr = substr(md5(rand()), 0, 7);

echo <<<_LOGGEDIN
<head>
	<title>Pedagog</title>
	<link rel="stylesheet" type="text/css" href="sekretaria.css">
	<script type="text/javascript" src="student.js"></script>
</head>
       <nav>
	<div class="sidebar" >
		<a href="sek_header.php">Sekretaria Mesimore</a>
		<a href="student.php">Student</a>
		<a class="active" href="pedagog.php">Pedagog</a>
		<a href="lendet.php">Lendet</a>
		<a href="grupi.php">Klasa</a>
		<a href="vertetime.php">Vertetime</a>
	</div>
</nav>

_LOGGEDIN;


?>
