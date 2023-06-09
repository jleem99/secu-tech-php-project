<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $TITLE ?></title>

	<meta name="theme-color" content="#5028F8">
	<link rel="manifest" href="/app.webmanifest">
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-touch-icon.png">

	<link rel="stylesheet" href="/css/tailwind.css">
</head>

<?php
$user = isset($_SESSION['user']) && !empty($_SESSION['user']) ? $_SESSION['user'] : unserialize($_COOKIE['user']);
$return_data = isset($_SESSION['form_input']) && !empty($_SESSION['form_input']) ? $_SESSION['form_input'] : '';
?>