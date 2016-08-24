<?php
header('content-type: application/json');

$servername = "localhost";
$username = "orchid";
$password = "orchid1234";
$dbname = "orchid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `paph14` WHERE paph_id = 1";
$result = $conn->query($sql);
$orchidResult = $result->fetch_assoc();

// Disconnect database
$conn->close();

$uploaddir = 'photos';
$filename = basename($_FILES['photo']['name']);
$uploadfile = $uploaddir . '/' . $filename;

if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
    // Upload photo failed
    http_response_code(500);
    echo json_encode(['message' => 'Possible file upload attack!']);
    exit();
}

// Execute command
$commandInput = "lib\orchid.bat $uploadfile";
exec($commandInput, $commandOutput, $returnVar);

// Example orchid response
$orchidResult['photo_image'] = 'http://'.$_SERVER['HTTP_HOST'].'/orchid-api/api/'.$uploadfile;
$orchidResult['orchid_image'] = 'http://'.$_SERVER['HTTP_HOST'].'/orchid-api/api/orchid-photos/cattleya.jpg';

// Upload photo success
http_response_code(200);
echo json_encode([
	'code' => 200,
	'message' => 'File is valid, and was successfully uploaded.',
	'photo' => $photo,
    'input' => $commandInput,
    'output' => $commandOutput,
    'orchid' => $orchidResult,
], JSON_UNESCAPED_SLASHES);
