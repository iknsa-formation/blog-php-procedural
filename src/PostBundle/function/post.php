<?php

function PostIndex ()
{
    return [
        "view" => "src/PostBundle/resources/views/blog.php"
    ];
}

function PostShow ()
{
    return [
        "view" => "src/PostBundle/resources/views/detail.php"
    ];
}

function PostNew($db)
{
    if (strtolower($_SERVER["REQUEST_METHOD"]) === 'post') {
        echo "<pre>";
        var_dump($_POST);
        var_dump($_FILES);

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

        echo "</pre>";
    }

    return [
        "view" => "src/PostBundle/resources/views/new.php"
    ];
}