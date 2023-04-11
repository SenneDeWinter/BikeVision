<?php
include('./vendor/autoload.php');
include('./functions/database.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

$db = dbConnect();

if (isset($_SESSION['logged_in'])) {
    try {
        deleteMessage($db, htmlspecialchars($_GET['id']));
        header('Location: messages.php');
    } catch (\Exception $exception) {
        header('Location: index.html');
    }
} else {
        header('Location: login.php');
}
?>