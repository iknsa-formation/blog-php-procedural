<?php

function PostIndex ($db)
{
    $posts = $db->query("SELECT p.*, u.username as author FROM `post` AS p, `bloguser` as u WHERE p.`author`=u.`id`")->fetchAll($db::FETCH_ASSOC);

    return [
        "view" => "src/PostBundle/resources/views/blog.php",
        "posts" => $posts
    ];
}

function PostShow ($db)
{
    $id = $_GET["id"];

    $post = $db->query("SELECT p.*, u.username as author FROM `post` AS p, `bloguser` as u WHERE p.`author`=u.`id` AND p.id = " . $id)->fetch($db::FETCH_ASSOC);

    return [
        "view" => "src/PostBundle/resources/views/detail.php",
        "post" => $post
    ];
}

function PostNew($db)
{
    if (strtolower($_SERVER["REQUEST_METHOD"]) === 'post') {
        $file = $_FILES["image"];
        $fileName = uniqid();
        $originalFileName = $file["name"];

        if (move_uploaded_file($file["tmp_name"], "web\uploads\\" . $fileName)) {
            $post["imageFileName"] = $fileName;
            $post["imageOriginalFileName"] = $originalFileName;

            $post["title"] = $_POST["title"];
            $post["content"] = $_POST["content"];
        }

        $username = $_SESSION["security"]["user"]["username"];

        $query = $db->query("SELECT * FROM `bloguser` WHERE `username`='" . $username . "'");
        $user = $query->fetch($db::FETCH_ASSOC);

        if (isset($post) && !empty($post)) {
            $query = $db->prepare(
                "INSERT INTO `post` (`title`, `content`, `imageFileName`, `imageOriginalFileName`, `author`) VALUES (:title, :content, :imageFileName, :imageOriginalFileName, :author)"
            );

            $query->bindValue(':title', $post["title"]);
            $query->bindValue(':content', $post["content"]);
            $query->bindValue(':imageFileName', $post["imageFileName"]);
            $query->bindValue(':imageOriginalFileName', $post["imageOriginalFileName"]);
            $query->bindValue(':author', $user["id"]);

            $query->execute();
        }
    }

    return [
        "view" => "src/PostBundle/resources/views/new.php"
    ];
}