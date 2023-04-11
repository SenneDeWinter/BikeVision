<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body>
<?php

include('./vendor/autoload.php');
include('./functions/database.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

$db = dbConnect();

if (isset($_POST['submit'])) {
    $user = getUserByEmail($db, htmlspecialchars($_POST['email']));
    if (!isset($_SESSION['logged_in'])) {
        if ($user && password_verify(htmlspecialchars($_POST['password']), $user['password'])) {
            $_SESSION['logged_in'] = 1;
            $_SESSION['user_id'] = $user['id'];
            header('Location: messages.php');
        } else {
            $_SESSION['error'] = 'Invalid username or password';
        }
    }
}


?>
<div class="grid h-screen place-items-center">
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm w-full">
        <div class="text-2xl font-light">
            <h1>Log in</h1>
            <br>
        </div>
        <form method="post" id="login">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Email</label>
                <input type="email" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="email"
                       aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputPassword2" class="form-label inline-block mb-2 text-gray-700">Password</label>
                <input type="password" class="form-control block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="password"
                       placeholder="Password">
            </div>
            <?php if ($_SESSION['error'] ?? null): ?>
                <p class="text-xs text-red-600"><?= $_SESSION['error'] ?? null; ?></p>
                <br>
                <?php $_SESSION['error'] = null; ?>
            <?php endif; ?>
            <button type="submit" name="submit" class="
      w-full
      px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out" id="submit">Sign in
            </button>
        </form>
    </div>
</div>
</body>
</html>