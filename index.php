<?php
require_once ("include/database.php");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <div>
        <h3>Search by posts</h3>
        <form action="" method="get">
            <input type="text" name="query">
            <input type="submit">
        </form>
    </div>
    <pre>
        <?php

            if (!empty($_GET['query'])) {

                $query = ($_GET['query']);

               if (mb_strlen($query) >=3) {
                   $sql = "SELECT DISTINCT posts.* FROM posts JOIN comments ON posts.id = comments.postId WHERE comments.body LIKE '%$query%'";

                   $posts = mysqli_query($connection, $sql)->fetch_all();

                   if (empty($posts)) {
                       echo "Записи не найдены";
                   }
                   foreach ($posts as $post) {
                       print_r($post);
                   }

               } else {
                   echo "Запрос должен содержать минимум 3 символа";
               }
            } else {
                echo "Введеите поисковой запрос";
            }

        ?>
    </pre>



</body>
</html>

