<?php
header('content-type: application/json');

$uploaddir = 'photos';
$filename = basename($_FILES['photo']['name']);
$uploadfile = $uploaddir . '/' . $filename;

if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
    // Upload photo failed
    http_response_code(500);
    echo json_encode(['message' => 'Possible file upload attack!']);
    exit();
}

// TODO: Execute command
$commandInput = 'java -cp ".;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;..\orchid-lib\CalEn.jar" ..\orchid-lib\TestCalEn '.$uploaddir.'\\'.$filename;
$commandOutput = exec($commandInput);

// Upload photo success
http_response_code(200);
echo json_encode(['message' => 'File is valid, and was successfully uploaded.',
    'input' => $commandInput,
    'output' => $commandOutput
]);
