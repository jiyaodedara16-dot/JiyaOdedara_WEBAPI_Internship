<?php
    require "vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $spreadsheet = IOFactory::load("users.xlsx");

    $sheet = $spreadsheet->getActiveSheet();

    $records = $sheet->toArray();
    $count =0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel Data</title>
    <link rel="stylesheet" href="css/showDataCss.css">
</head>
<body>
    <a href="index.php"><button class="btn">Add Data +</button></a>

    <div class="box">
        <h1>Importing Excel Data</h1>
        <div class="table">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Profile Image</th>
                        <th>Username</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php 
                    $count = 0;
                    foreach($records as $record){ 
                     ?>
                    <tr>
                        <td>
                            <img src="images/<?php echo $record[2] ; ?>" class="profile-img">
                        </td>
                        <td><?php echo $record[0] ; ?></td>
                        <td><?php echo $record[1] ; ?></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>