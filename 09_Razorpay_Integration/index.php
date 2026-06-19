<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">

        <div class="form-card">
            <div class="ms"></div>
            <h1>Payment</h1>
            <p>Using Razorpay</p>

            <form method="post" action="payment.php" id="form">

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username">
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter email">
                </div>

                <div class="input-group">
                    <label>Amount</label>
                    <input type="text" name="amount" id="amount" placeholder="Enter Amount">
                </div>
                <button type="submit" name="pay" class="btn" id="btn">
                    Pay
                </button>

            </form>

        </div>

    </div>

</body>
</html>