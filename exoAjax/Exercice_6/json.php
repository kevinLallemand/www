<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    $response['data'] = "blablabla";
    $response['type'] = "json";
    $response['date'] = new \DateTime();
    echo json_encode($response);
}
