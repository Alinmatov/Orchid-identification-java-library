<?php
header('content-type: application/json');

$commandInput = 'git pull';
exec($commandInput, $commandOutput, $returnVar);

// Upload photo success
http_response_code(200);
echo json_encode([
    'input' => $commandInput,
    'output' => $commandOutput,
]);
