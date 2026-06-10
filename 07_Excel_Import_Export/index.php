<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="showData.php"><button class="btn">See Data</button></a>
    <div class="container">

        <div class="form-card">

            <h1>User Registration</h1>
            <p>Store user details into Excel file</p>

            <form action="insertData.php" method="POST" enctype="multipart/form-data">

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter username">
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter email">
                </div>

                <div class="input-group">
                    <label>Profile Image</label>
                    <input type="file" name="profile">
                </div>

                <button type="submit" name="submit" class="btn">
                    Save User
                </button>

            </form>

        </div>

    </div>

</body>
</html>