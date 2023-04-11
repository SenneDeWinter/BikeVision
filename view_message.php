<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Detail</title>
</head>
<body>
<?php

include('./vendor/autoload.php');
include('./functions/database.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

if (isset($_SESSION['logged_in'])) {
    $db = dbConnect();
    $messages = getMessageById($db, htmlspecialchars($_GET['id']));    
} else {
        header('Location: login.php');
}

?>

<div class="container mx-auto">
    <?php foreach ($messages as $message): ?>
        <div class="rounded-xl bg-gray-800 w-auto h-fit p-10 m-10">
            <h1 class="text-4xl font-light text-gray-200"><?= $message['subject']; ?></h1>
            <br>
            <p class="text-s font-light text-gray-200"><?= $message['message']; ?></p>
            <br>
            <p class="text-gray-200 font-light"><?= $message['name'] ?></p>
            <p class="text-gray-200 font-light"><a href="mailto:<?= $message['email'] ?>"><?= $message['email'] ?></a></p>
            <br>
            <p class="text-gray-200 font-light"><?= $message['created_at'] ?></p>
        </div>
    <?php endforeach; ?>
</div>