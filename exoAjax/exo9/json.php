<?php
$input = file_get_contents("php://input");
$data = json_decode($input);

if ($data && isset($data->login) && isset($data->password)) {
    // Validez et traitez les données (par exemple, vérifiez les identifiants)
    if ($data->login === "utilisateur" && password_verify($data->password, "motdepasse_haché")) {
        echo json_encode(["type" => "Success"]);
    } else {
        echo json_encode(["type" => "Error"]);
    }
} else {
    echo json_encode(["type" => "Error"]);
}