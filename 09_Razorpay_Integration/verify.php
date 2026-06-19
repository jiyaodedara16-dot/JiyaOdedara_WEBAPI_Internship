<?php
require('resources/vendor/autoload.php');
require('config/config.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$key_id = "rzp_test_T2FEgEk7yGwvn0";
$key_secret = "QHv33l11oYTGkRU8qUShfEcL";

$success = false;
$error = "Razorpay Error";

$razorpay_payment_id = $_POST['razorpay_payment_id'] ?? '';
$razorpay_order_id = $_POST['razorpay_order_id'] ?? '';
$razorpay_signature = $_POST['razorpay_signature'] ?? '';

if (!empty($razorpay_payment_id) && !empty($razorpay_signature) && !empty($razorpay_order_id)) {
    $api = new Api($key_id, $key_secret);

    try {
        $attributes = array(
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature
        );

        $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    } catch(SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
} else {
    $error = 'Invalid Payload data provided.';
}

// Update Database
$status = $success ? 'paid' : 'failed';
$stmt = mysqli_prepare($conn, "UPDATE payment SET status = ?, razorpay_payment_id = ?, razorpay_signature = ? WHERE razorpay_order_id = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssss", $status, $razorpay_payment_id, $razorpay_signature, $razorpay_order_id);
    if (!mysqli_stmt_execute($stmt)) {
        error_log("DB Update Error: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
} else {
    error_log("DB Update Prepare Error: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment <?= $success ? 'Successful' : 'Failed' ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:'Inter',sans-serif;
            text-align:center;

            background:linear-gradient(
                90deg,
                #0b1830 0%,
                #2751b6 100%
            );
        }

        .glass-card{
            width:100%;
            max-width:500px;
            padding:50px 40px;

            background:rgba(43,55,84,.9);
            backdrop-filter:blur(20px);
            -webkit-backdrop-filter:blur(20px);

            border:1px solid rgba(255,255,255,.08);
            border-radius:28px;

            box-shadow:
                0 25px 60px rgba(0,0,0,.35),
                inset 0 1px 0 rgba(255,255,255,.05);
        }

        .icon{
            font-size:80px;
            margin-bottom:20px;

            animation:pop .5s cubic-bezier(.175,.885,.32,1.275) forwards;
            transform:scale(0);
        }

        @keyframes pop{
            to{
                transform:scale(1);
            }
        }

        .success-icon{
            color:#22c55e;
        }

        .error-icon{
            color:#ef4444;
        }

        h1{
            color:#fff;
            font-size:34px;
            font-weight:700;
            margin-bottom:12px;
        }

        p{
            color:#cbd5e1;
            line-height:1.7;
            font-size:15px;
            margin-bottom:30px;
        }

        .payment-id{
            background:rgba(255,255,255,.06);
            border:1px solid rgba(255,255,255,.08);

            padding:14px;
            border-radius:14px;

            color:#93c5fd;
            font-family:monospace;
            word-break:break-all;

            margin-bottom:30px;
        }

        .btn{
            display:inline-flex;
            justify-content:center;
            align-items:center;

            width:100%;
            height:58px;

            border:none;
            border-radius:16px;

            background:linear-gradient(
                90deg,
                #4f8cff,
                #2563eb
            );

            color:#fff;
            font-size:16px;
            font-weight:600;
            text-decoration:none;

            transition:.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
            box-shadow:0 15px 30px rgba(37,99,235,.35);
        }
</style>
</head>
<body>

  <div class="glass-card">
    <?php if ($success): ?>
        <div class="icon success-icon">✓</div>
        <h1>Payment Successful</h1>
        <p>Your payment has been processed successfully using Razorpay.</p>
        <div class="payment-id">Payment ID: <?= htmlspecialchars($razorpay_payment_id) ?></div>

    <?php else: ?>

        <div class="icon error-icon">✕</div>
        <h1>Payment Failed</h1>
        <p>Unfortunately your payment could not be completed.</p>
        <div class="payment-id">Error: <?= htmlspecialchars($error) ?></div>

    <?php endif; ?>
    
    <a href="index.php" class="btn">Return to Home</a>
  </div>

</body>
</html>
