<?php

if (isset($_GET['ajax'])) {
    ajax();
}

function ajax()
{
    $db = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
    $posts = $db->query("SELECT p.*, u.username as author FROM `post` AS p, `bloguser` as u WHERE p.`author`=u.`id`")->fetchAll($db::FETCH_ASSOC);

    echo json_encode($posts);
}