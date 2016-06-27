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
$commandInput = 'java -cp "C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;..\orchid-lib\CalEn.jar;..\orchid-lib\." TestCalEn '.$uploaddir.'\\'.$filename;
// exec($commandInput, $commandOutput, $returnVar);
$commandOutput = system($commandInput);

// Example orchid response
$orchid['name'] = 'กล้วยไม้สกุลแคทลียา Cattleya';
$orchid['detail'] = 'แคทลียาเป็นกล้วยไม้ที่ได้รับความนิยมปลูกเลี้ยงอย่างกว้างขวางในหลายประเทศ เนื่องจากแคทลียาเป็นกล้วยไม้ที่มีดอกขนาดใหญ่ที่สุดและสีสวยงามที่สุด บางชนิดมีกลิ่นหอม และถือกันว่าแคทลียาเป็น ราชินีแห่งกล้วยไม้ และเป็นสัญลักษณ์สากลของกล้วยไม้ทั่วไป
แคทลียาเป็นกล้วยไม้ที่มีถิ่นกำเนิดอยู่ในเขตร้อนแถบอเมริกากลางและอเมริกาใต้ตอนเหนือ เป็นกล้วยไม้ที่เจริญเติบโตและมีรูปทรงแบบซิมโพเดี้ยล คือมีเหง้าแนบไปตามเครื่องปลูก เหง้าอาจจะมีทั้งยาวและสั้น มีรากงอกเจริญจากเหง้า ไม่มีรากแขนง เป็นระบบรากกึ่งอากาศดูดอาหารจากอากาศและเครื่องปลูก แคทลียาเป็นกล้วยไม้ที่มีลำลูกกล้วย มีหลายลักษณะ บางชนิดลำลูกกล้วยเป็นข้อปล้อง รูปทรงของลำป่องตรงกลางหรือค่อนไปข้างบนของลำเล็กน้อย มีหน้าที่เก็บสะสมอาหาร เหนือข้อที่โคนลำจะมีตา 2 ตา คือตาซ้าย และตาขวา เป็นตาแตกลำใหม่ง่ายที่สุด บางชนิดที่ลำลูกกล้วยอ้วนป้อม บางชนิดเป็นรูปทรงกระบอกหรือบิดเป็นเกลียวเล็กน้อย ผิวพื้นของลำอาจเกลี้ยงหรือเป็นร่องตามความยาวของลำ เมื่อกล้วยไม้เจริญเติบโต ลำที่ 1 หรือเรียกว่าลำหลัง จะแตกตาออกแล้วเจริญเป็นลำที่ 2 หรือเรียกว่าลำหน้า เมื่อลำที่ 2 เจริญดีแล้วก็จะแตกตาออกเป็นลำที่ 3 และที่ 4 ออกไปเรื่อยๆ บางครั้งตาแตกออกเป็น 2 ทางเรียกว่า ไม้ 2 หน้า จึงทำให้ดูเป็นกอใหญ่ โดยมีเหง้าเป็นส่วนที่เชื่อมโยงของลำลูกกล้วยลำต่อลำ และเป็นส่วนของลำที่เจริญออกจากลำเดิม';
$orchid['image_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/orchid-api/api/orchid-photos/cattleya.jpg';

// Upload photo success
http_response_code(200);
echo json_encode(['message' => 'File is valid, and was successfully uploaded.',
    'input' => $commandInput,
    'output' => $commandOutput,
    'orchid' => $orchid,
], JSON_UNESCAPED_SLASHES);
