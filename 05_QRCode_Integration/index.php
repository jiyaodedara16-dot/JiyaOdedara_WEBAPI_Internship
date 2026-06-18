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
            <div class="ms"></div>
            <h1>User Registration</h1>
            <p>QrCode</p>

            <form method="post" action="generateQr.php" id="form">

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username">
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter email">
                </div>

                <div class="input-group">
                    <label>Course</label>
                    <input type="text" name="course" id="course" placeholder="Enter course">
                </div>
                <button type="submit" name="generate" class="btn" id="btn">
                    Generate Qrcode
                </button>

            </form>

        </div>

    </div>

</body>
</html>