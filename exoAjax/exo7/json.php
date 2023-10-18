<?php
$input = file_get_contents("php://input");
$data = json_decode($input);

if ($data && isset($data->login) && isset($data->password)) {
    // Hachez le mot de passe
    $hashedPassword = password_hash($data->password, PASSWORD_DEFAULT);

    // Modifiez la réponse pour inclure le mot de passe haché
    $data->password = $hashedPassword;
    echo json_encode($data);
} else {
    // Si les données ne peuvent pas être traitées correctement, renvoyez la date et le type
    echo json_encode(["type" => "Error", "date" => date("Y-m-d")]);
}