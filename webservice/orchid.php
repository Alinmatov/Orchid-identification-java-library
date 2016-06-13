<?php
header('content-type: application/json');

$uploaddir = 'photos/';
$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
    // Upload photo failed
    http_response_code(500);
    echo json_encode(['message' => 'Possible file upload attack!']);
    exit();
}

// TODO: Execute command
$commandInput = "$uploadfile";
$commandOutput = exec("pwd");

// Upload photo success
http_response_code(200);
echo json_encode(['message' => 'File is valid, and was successfully uploaded.',
    'input' => $commandInput,
    'output' => $commandOutput
]);


