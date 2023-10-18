<?php
$response = array(
    'login' => ('email'),
    'password' => ('mot de passe'),
    'date' => date('Y-m-d'),
    
    
);

header('Content-Type: application/json');
echo json_encode($response);
?>
