<?php
include "phpqrcode/qrlib.php";

$name = 'Jiya Odedara';
$collage = 'Government Polytechnic Porbandar';
$sem = '4TH';

$data = "<h2>Name : $name\nCollage : $collage\nSem : $sem</h2>";

$file = 'qrCodes/qrcode.png';
if(!is_dir('qrCodes')){
    mkdir('qrCodes', 0777, true);
}

QRcode::png($data, $file, QR_ECLEVEL_L, 5);
echo "QRCode created successfully! ";

?>