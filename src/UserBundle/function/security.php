<?php

function UserLogin($db)
{
    if (strtolower($_SERVER["REQUEST_METHOD"]) === 'post') {
        $login = $_POST["login"];
        $pass = $_POST["password"];

        $query = $db->query("SELECT * FROM `bloguser` WHERE `username` = '" . $login ."'");
        $user = $query->fetch($db::FETCH_ASSOC);

        if (!$user) {
            $_SESSION["flash"][] = [
                "type" => "danger",
                "message" => "Utilisateur n'existe pas!",
                "viewed" => 0
            ];

            return [
                "view" => "src/UserBundle/resources/views/login.php"
            ];
        }

        if (password_verify($pass . $user["salt"], $user["password"])) {
            $_SESSION["security"] = [
                "user" => [
                    "username" => $user["username"],
                    "email" => $user["email"]
                ],
                "isAuthenticated" => true
            ];
        }

        /**
         * @todo redirige sur la home page ou sur le HTTP Referer
         * @todo si l'utilisateur est déjà connecté, il ne doit pas pouvoir accéder à la page login.
         */
    }

    return [
        "view" => "src/UserBundle/resources/views/login.php"
    ];
}

function UserLogout()
{
    /**
     * On déconnecte et on redirige sur la page d'accueil
     */
    $_SESSION["security"] = [];
    header('Location: /blog');
}