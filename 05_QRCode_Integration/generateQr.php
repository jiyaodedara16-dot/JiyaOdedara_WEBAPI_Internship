<?php
include "phpqrcode/qrlib.php";
if(isset($_POST['generate'])){
    $name = ucwords(trim($_POST['username']));
    $course = ucwords(trim($_POST['course']));
    $email = trim($_POST['email']);
}


$data = "Name : $name\n\Email : $email\n\nCourse : $course";

$file = 'qrCodes/'.$name.date("i");
if(!is_dir('qrCodes')){
    mkdir('qrCodes', 0777, true);
}

QRcode::png($data, $file, QR_ECLEVEL_L, 5);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">

        <div class="form-card">
            <h1>Qrcode Generated</h1>
            <p>Scan the Qrcode</p>

            <div class="qrbox">
                <img src="<?php echo $file;?>" height="200" width="200" alt="">
            </div>

        </div>

    </div>

</body>
</html>