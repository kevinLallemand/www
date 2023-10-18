<?php
$response = array(
    'data' => 'Données importantes',
    'type' => 'Type de données'
);

header('Content-Type: application/json');
echo json_encode($response);
?>
