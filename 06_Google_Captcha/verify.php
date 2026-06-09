<?php
    if(isset($_POST['login'])){

        $username = $_POST['username'];
 
        $secretKey = '6LcXdBUtAAAAAB7Sayn5l_LUz3QjLlf274ti1CoU';
        $responseKey = $_POST['g-recaptcha-response'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$responseKey;
        if(isset($responseKey) && !empty($responseKey)){
            $response = file_get_contents($url);

            $responseData = json_decode($response);

            if($responseData->success){ ?>
                <script>
                    alert("Login Successfully Done!\nWelcome <?php echo $username; ?>");   
                    window.location.href = 'index.php'; 
                </script>
                    <?php
            }
        }

    }

?>
