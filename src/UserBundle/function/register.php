<?php

function UserRegister($db)
{
    echo "<pre>";
    // var_dump($_SERVER);
    echo "</pre>";

    if (strtolower($_SERVER["REQUEST_METHOD"]) === 'post') {

        $salt = crypt(mt_rand(10, 18), mt_rand(10, 18));

        $query = $db->prepare(
            "INSERT INTO `bloguser` (`username`,`email`,`password`,`avatar`, `salt`)
                VALUES (:username, :email, :password, :avatar, :salt)"
        );

        $username = $_POST["username"];

        /**
         * @todo si le username ne correspond pas à nos critères. On retourne une erreur.
         * critères /[a-z+][0-9+]/i
         * @return $valid false
         */
        
        /**
         * @todo controle email: FILTER_VALIDATE_EMAIL
         * @return $valid false
         */
        
        /**
         * @todo ^\W min=>6
         * @return $valid false
         */

        $valid = true;

        if ($valid) {
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $_POST["email"]);
            $query->bindValue(':password', password_hash($_POST["password"] . $salt, PASSWORD_BCRYPT));
            $query->bindValue(':avatar', $_POST["avatar"]);
            $query->bindValue(':salt', $salt);

            $query->execute();
        } else {
            $_SESSION["flash"][] = [
                "type" => "danger",
                "message" => "Formulaire invalid!",
                "viewed" => 0
            ];
        }

        header('Location: ' . $_SERVER["HTTP_REFERER"]);
    }

    return [
        "view" => "src/UserBundle/resources/views/register.php"
    ];
}
