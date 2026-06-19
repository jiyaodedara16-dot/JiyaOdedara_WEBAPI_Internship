<?php
session_start();
require('resources/vendor/autoload.php');
require('config/config.php');

use Razorpay\Api\Api;

$key_id = "rzp_test_T2FEgEk7yGwvn0";
$key_secret = "QHv33l11oYTGkRU8qUShfEcL";


     // Get POST data

    $amount = trim($_POST['amount']) ?? ''; // in paise
    $email= trim($_POST['email']) ?? '';
    $name= trim($_POST['username']) ?? '';

    if($amount==="" OR $amount==0 OR $amount<0 OR empty($email) OR empty($name)){
    ?><script>
        window.location.href="index.php";
        alert("Invalid request. Please fill out the from.");
    </script><?php
    }

    //creating api object
    $api = new Api($key_id, $key_secret);

    // Create order
    $order = $api->order->create([
        'receipt' => uniqid(),
        'amount' => $amount*100,
        'currency' => 'INR',
    ]);

    //fetching orderID from razorpay
    $order_id = $order['id'];

     // Log the order to the database with status 'created'
    $status = 'created';
    $stmt = mysqli_prepare($conn, "INSERT INTO payment (name, email, amount, razorpay_order_id, status) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdss", $name, $email, $amount, $order_id, $status);
        if (!mysqli_stmt_execute($stmt)) {
            die("Database error while logging order: " . mysqli_stmt_error($stmt));
        }
            mysqli_stmt_close($stmt);
    } else {
        die("Database prepare error: " . mysqli_error($conn));
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Processing Payment...</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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

            background:linear-gradient(
                90deg,
                #0d1b33 0%,
                #1b3f8f 100%
            );
        }

        .loader-card{
            width:450px;
            text-align:center;
            padding:50px 40px;

            background:rgba(42,55,82,0.9);
            backdrop-filter:blur(20px);

            border:1px solid rgba(255,255,255,.08);
            border-radius:28px;

            box-shadow:
            0 20px 50px rgba(0,0,0,.35),
            inset 0 1px 0 rgba(255,255,255,.05);
        }

        .spinner{
            width:85px;
            height:85px;
            margin:0 auto 30px;

            border:6px solid rgba(255,255,255,.12);
            border-top:6px solid #3b82f6;
            border-radius:50%;

            animation:spin 1s linear infinite;
        }

        @keyframes spin{
            to{
                transform:rotate(360deg);
            }
        }

        h2{
            color:#ffffff;
            font-size:30px;
            font-weight:700;
            margin-bottom:10px;
        }

        p{
            color:#cbd5e1;
            font-size:15px;
            line-height:1.7;
        }

        .progress{
            width:100%;
            height:8px;
            margin-top:28px;
            background:rgba(255,255,255,.1);
            border-radius:50px;
            overflow:hidden;
        }

        .progress-bar{
            height:100%;
            width:40%;
            background:linear-gradient(
                90deg,
                #4f8cff,
                #2563eb
            );

            animation:loading 1.5s infinite;
        }

        @keyframes loading{
            0%{
                transform:translateX(-100%);
            }
            100%{
                transform:translateX(300%);
            }
        }
</style>
</head>
<body>
<div class="loader-card">
    <!-- <div class="spinner"></div> -->

    <h2>Processing Donation</h2>

    <p>
        Please wait while we securely connect to Razorpay and
        prepare your donation checkout.
    </p>

    <div class="progress">
        <div class="progress-bar"></div>
    </div>
</div>

<!-- Hidden form for submitting verification data to verify.php -->
<form id="verifyForm" action="verify.php" method="POST" style="display: none;">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>

<script>
var options = {
    "key": "<?= htmlspecialchars($key_id) ?>", 
    "amount": "<?= htmlspecialchars($amount) ?>",
    "currency": "INR",
    "name": "Razorpay Payment",
    "description": "Secure Payment Checkout",
    "order_id": "<?= htmlspecialchars($order_id) ?>",
    "handler": function (response) {
        // Populate the hidden form fields with the response data
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        
        // Submit the form to verify.php
        document.getElementById('verifyForm').submit();
    },
    "prefill": {
        "name": "<?= htmlspecialchars($name) ?>",
        "email": "<?= htmlspecialchars($email) ?>"
    },
    "theme": {
        "color": "#2563EB"
    },
    "method": {
      "upi": true,
      "card": true,
      "wallet": true,
      "netbanking": true
    },
    "config": {
        "display": {
            "blocks": {
                "upi_block": {
                    "name": "Pay via UPI",
                    "instruments": [
                        {
                            "method": "upi"
                        }
                    ]
                }
            },
            "sequence": ["upi_block"],
            "preferences": {
                "show_default_blocks": true
            }
        }
    },
    "modal": {
        "ondismiss": function(){
            window.location.href = 'index.php';
        }
    }
};
var rzp = new Razorpay(options);
rzp.open();
</script>
</body>
</html>
