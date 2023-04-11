<?php
declare(strict_types=1);

function dbConnect(): PDO
{
    $conn = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

function addMessage(PDO $conn, string $name, string $email, string $subject, string $message, string $newsletter): void
{
    if($newsletter == 'on') {
        $newsletter = 1;
    } else {
        $newsletter = 0;
    }

    $statement = $conn->prepare('INSERT INTO messages (name, email, subject, message, newsletter) VALUES (:nameParam, :emailParam, :subjectParam, :messageParam, :newsletterParam);');
    $statement->bindParam(':nameParam', $name);
    $statement->bindParam(':emailParam', $email);
    $statement->bindParam(':messageParam', $message);
    $statement->bindParam(':subjectParam', $subject);
    $statement->bindParam(':newsletterParam', $newsletter);
    $statement->execute();
}

function getMessages(PDO $conn): array
{
    $statement = $conn->prepare('SELECT * FROM messages WHERE deleted_at IS NULL ORDER BY created_at ASC;');
    $statement->execute();

    $messages = $statement->fetchAll();
    return $messages;
}

function getMessageById(PDO $conn, int $id): array
{
    $statement = $conn->prepare('SELECT * FROM messages WHERE id = :idParam AND deleted_at IS NULL;');
    $statement->bindParam('idParam', $id);
    $statement->execute();

    $messages = $statement->fetchAll();
    return $messages;
}

function deleteMessage(PDO $conn, int $id): void
{
    $statement = $conn->prepare('UPDATE messages SET deleted_at = CURRENT_TIMESTAMP() WHERE id = :idParam;');
    $statement->bindParam('idParam', $id);
    $statement->execute();
}

function getSubscribers(PDO $conn): array
{
    $statement = $conn->prepare('SELECT DISTINCT email FROM messages WHERE newsletter = 1;');
    $statement->execute();

    $subscribers = $statement->fetchAll();
    return $subscribers;
}

function getUserByEmail(PDO $conn, string $email): array|bool
{
    $statement = $conn->prepare('SELECT * FROM users where email = :email;');
    $statement->bindParam('email', $email);
    $statement->execute();
    $user = $statement->fetch();
    return $user;
}
