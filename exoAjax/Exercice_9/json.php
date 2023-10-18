<?php
if (isset($_POST['password']) && isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['login'])) {
    $mdp = htmlspecialchars($_POST['password']);
    if (filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
        $login = htmlspecialchars($_POST['login']);
    } else {
        $login = null;
    }
    $passHash =  password_hash($pass, PASSWORD_BCRYPT);
    $response['password'] = $passHash;
    $response['login'] = $login;
    $response['type'] = "json";
    $response['date'] = new \DateTime();
    echo json_encode($response);
} else {
    $response['type'] = "json";
    $response['date'] = new \DateTime();
    echo json_encode($response);
}
