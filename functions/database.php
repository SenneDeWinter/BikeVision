<?php
declare(strict_types=1);

/** DB Connection */
function dbConnect(): PDO
{
    $conn = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

/** Articles */
function getArticles(PDO $conn): array
{
    $statement = $conn->prepare('SELECT articles.* , users.username FROM articles INNER JOIN users ON articles.user_id = users.id WHERE articles.deleted_at IS NULL ORDER BY articles.created_at DESC;');
    $statement->execute();

    $articles = $statement->fetchAll();
    return $articles;
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
