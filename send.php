<?php

include('./vendor/autoload.php');
include('./functions/database.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

$db = dbConnect();
addMessage($db, htmlspecialchars($_POST['name']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['subject']) ,htmlspecialchars($_POST['message']), htmlspecialchars($_POST['newsletter']));
header('Location: /');