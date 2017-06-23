<?php

if (!isset($_GET["route"]) || $_GET["route"] === "") {
    $_GET["route"] = "accueil";
}

$route = $_GET["route"];
unset($_GET["route"]);

require_once 'app/routing.php';

foreach ($bundles as $bundle) {
    require_once 'src/' . $bundle . 'Bundle/resources/config/routing.php';
}

if (!isset($routes[$route])) {
    $route = "404";
}


$fileNameAndFunction = explode('_', $routes[$route]);

$pathToFile = $fileNameAndFunction[0];
$functionName = $fileNameAndFunction[1];

if (isset($pathToFile) && $pathToFile !== "") {
    require_once $pathToFile;
}

/**
 * @todo  add convention for methods run by router
 */

if (!function_exists($functionName)) {
    die('La fonction ' . $functionName . ' n\'existe pas!');
}

$data = $functionName($db);
