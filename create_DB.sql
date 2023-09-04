    DROP DATABASE IF EXISTS search_posts;
    CREATE DATABASE search_posts;

    use search_posts;

    DROP TABLE IF EXISTS posts;
    CREATE TABLE posts(
        userId int NOT NULL,
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title varchar(100) NOT NULL,
        body text NOT NULL
    ) engine InnoDB default charset= utf8mb4;

    DROP TABLE IF EXISTS comments;
    CREATE TABLE comments(
        postId int NOT NULL,
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        body varchar(500) NOT NULL,
        FOREIGN KEY (postId) references posts(id)
    ) engine InnoDB default charset= utf8mb4;