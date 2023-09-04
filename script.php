<?php
require_once 'include/database.php';

$json_posts = file_get_contents("https://jsonplaceholder.typicode.com/posts");
$json_comments = file_get_contents("https://jsonplaceholder.typicode.com/comments");

$data_posts = json_decode($json_posts, true);
$data_comments = json_decode($json_comments, true);

$count_posts = 0;
$count_comments = 0;

$startTime = microtime(true);

$sql = "INSERT INTO posts (userId, id, title, body) VALUES";
foreach ($data_posts as $key => $post) {
    $sql .= "( {$post['userId']}, {$post['id']}, '{$post['title']}', '{$post['body']}')";
    if ($key+1 < count($data_posts)) {
        $sql .= ", ";
    }
    $count_posts += 1;
}
mysqli_query($connection, $sql);

$sql = "INSERT INTO comments (postId, id, name, email, body) VALUES";
foreach ($data_comments as $key => $comment) {
    $sql .= "( {$comment['postId']}, {$comment['id']}, '{$comment['name']}', '{$comment['email']}', '{$comment['body']}')";
    if ($key+1 < count($data_comments)) {
        $sql .= ", ";
    }
    $count_comments += 1;
}
mysqli_query($connection, $sql);

echo ("Загружено записей " . $count_posts."\n");
echo ("Загружено комментариев " . $count_comments);

echo "\nTime:  " . number_format(( microtime(true) - $startTime), 4) . " Seconds\n";

mysqli_close($connection);

