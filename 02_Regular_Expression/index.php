<?php 
$cities = [
    "Select City",
    "Porbandar",
    "Rajkot",
    "Jamnagar",
    "Junagadh",
    "Veraval",
    "Dwarka",
    "Khambhalia",
    "Kodinar",
    "Mangrol",
    "Kutiyana",
    "Jetpur",
    "Gondal",
    "Upleta",
    "Dhoraji",
    "Amreli"
];
?>
<?php
$fname = $mname = $lname = $contact = $email = $city = $gender = $username = $adharno = $panno = $password = $confirmpassword = '';
$fnameerr = $mnameerr = $lnameerr = $contacterr = $emailerr = $cityerr = $gendererr = $usernameerr = $adharnoerr = $pannoerr = $passworderr = $confirmpassworderr = '';  

if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $contact = trim($_POST['contact']);
    $email = trim($_POST['email']);
    $city = $_POST['city'];
    $gender = $_POST['gender'] ?? '';
    $username = trim($_POST['username']);
    $adharno = trim($_POST['adharno']);
    $panno = strtoupper(trim($_POST['panno']));
    $password = trim($_POST['password']);
    $confirmpassword  = trim($_POST['confirmpassword']);

    //fname
    if(empty($fname)){
        $fnameerr = 'please enter your first name';
    }else if(!preg_match('/^[a-zA-Z]+$/',$fname)){
        $fnameerr = 'please enter valid first name';  
    }

    //mname
    if(empty($mname)){
        $mnameerr = 'please enter your middle name';
    }else if(!preg_match('/^[a-zA-Z]+$/',$mname)){
        $mnameerr = 'please enter valid middle name';  
    }

    //lname
    if(empty($lname)){
        $lnameerr = 'please enter your last name';
    }else if(!preg_match('/^[a-zA-Z]+$/',$fname)){
        $lnameerr = 'please enter valid last name';  
    }

    //contact
    if(empty($contact)){
        $contacterr = 'please enter contact number';
    }else if(!preg_match('/^[0-9]{10}$/',$contact)){
        $contacterr = 'please enter valid contact number';  
    }   

    //email
    if(empty($email)){
        $emailerr = 'please enter email';
    }else if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$email)){
        $emailerr = 'please enter valid email';  
    }  
    
    //city
    if($city == 'Select City'){
        $cityerr = 'please select your city';
    }

    //gender
    if(empty($gender)){
        $gendererr = 'please select your gender';
    }

    //username
    if(empty($username)){
        $usernameerr = 'please enter username';
    }else if(!preg_match('/^[a-zA-Z0-9]+$/',$username)){
        $usernameerr = 'please enter valid username';  
    }   
    
    //adhar no
    if(empty($adharno)){
        $adharnoerr = 'please enter adharcard number';
    }else if(!preg_match('/^[0-9]{12}$/',$adharno)){
        $adharnoerr = 'please enter valid adharcard number';  
    } 

    //pan no
    if(empty($panno)){
        $pannoerr = 'please enter pancard number';
    }else if((!preg_match('/^[A-Z]{5}$/',substr($panno,0,6))) and (!preg_match('/^[0-9]{4}$/',substr($panno,5,9))) and (!preg_match('/^[A-Z]{1}$/',substr($panno,9)))){
        $pannoerr = 'please enter valid pancard number';  
    }

    //passowrd
    if(empty($password)){
        $passworderr = 'please enter password';
    }else if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/',$password)){
        $passworderr = 'please enter valid strong password';  
    }else if(strlen($password) != 8){
        $passworderr = 'password must be of 8 characters!';
    }

    // confirm passowrd
    if(empty($confirmpassword)){
        $confirmpassworderr = 'please enter password';
    }else if($confirmpassword != $password){
        $passworderr = 'please enter current passwordd';  
    }

    if($fnameerr == '' && $mnameerr=='' && $lnameerr=='' && $contacterr=='' && $emailerr=='' && $cityerr=='' && $gendererr=='' && $usernameerr=='' && $adharnoerr=='' && $pannoerr=='' && $passworderr=='' && $confirmpassworderr=='' ){
        echo "<script>alert('Given all Data are valid!');</script>";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        body{
            position: relative;
        }
        a .btn{
            border:none;
            outline:none;
            height:40px;
            width: 100px;
            border-radius:30px;
            background:rgba(255,255,255,0.5);
            color:#0F2854;
            position: absolute;
            top:0;
            left:0;
            margin: 10px 0 0 10px;
        }
    </style>
</head>
<body>
    <a href="../html.html"><button class="btn">Back</button></a>
    <div class="box">
        <div class="heading">
            <h2>Validation Form</h2>
        </div>
        <form action="#" method="post">
            <div class="row">
                <div class="field name">
                    <input type="text" name="fname" placeholder="your first name" value="<?php echo $fname; ?>">
                    <span class="error"><?php echo $fnameerr; ?></span>
                </div>
                <div class="field name">
                    <input type="text" name="mname" placeholder="your middle name"  value="<?php echo $mname; ?>">
                    <span class="error"><?php echo $mnameerr; ?></span>
                </div>
                <div class="field name">
                    <input type="text" name="lname" placeholder="your last name" value="<?php echo $lname; ?>">
                    <span class="error"><?php echo $lnameerr; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="field contacts">
                    <select name="city" id="">
                        <?php
                            $selectedcity = $city;
                            foreach ($cities as $city) {
                                if($city == 'Select City' and $selectedcity == 'Select City'){
                                    echo "<option value='$city' selected>$city</option>";
                                }else{
                                    echo "<option value='$city'". ($city == $selectedcity? "selected": '') .">$city</option>";
                                }
                                
                            }
                        ?>
                    </select>
                    <span class="error"><?php echo $cityerr; ?></span>
                </div>
                <div class="field contacts">
                    <input type="email" name="email" placeholder="your email" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailerr; ?></span>
                </div>
                <div class="field contacts">
                    <input type="text" name="contact" placeholder="your phone number" value="<?php echo $contact; ?>">
                    <span class="error"><?php echo $contacterr; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <input type="text" name="username" placeholder="your username" value="<?php echo $username; ?>">
                    <span class="error"><?php echo $usernameerr; ?></span>
                </div>
                <div class="field">
                    <input type="text" name="adharno" placeholder="your adharcard number" value="<?php echo $adharno; ?>">
                    <span class="error"><?php echo $adharnoerr; ?></span>
                </div>
                <div class="field">
                    <input type="text" name="panno" placeholder="your pancard number" value="<?php echo $panno; ?>">
                    <span class="error"><?php echo $pannoerr; ?></span>
                </div>
            </div>
            <div class="row gender">
                <div class="gender-box">
                    <label>Gender</label>

                    <div class="radio-group">
                        <label class="radio-item" >
                            <input type="radio" name="gender" value="male" 
                            <?= ($gender=='male')? "checked": ''; ?>>
                            Male
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="gender" value="female" 
                            <?= ($gender=='female')? "checked": ''; ?>>
                            Female
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="gender" value="other" 
                            <?= ($gender=='other')? "checked": ''; ?>>
                            Other
                        </label>
                    </div>
                    <span class="error" style="color:red;"><?php echo $gendererr; ?></span>
                </div>
                
            </div>
            <div class="row">
                <div class="field">
                    <input type="text" name="password" placeholder="your passowrd" value="<?php echo $password; ?>">
                    <span class="error"><?php echo $passworderr; ?></span>
                </div>
                <div class="field">
                    <input type="text" name="confirmpassword" placeholder="confirm your pasword again"  value="<?php echo $confirmpassword; ?>">
                    <span class="error"><?php echo $confirmpassworderr; ?></span>
                </div>
            </div>
            <div class="row button">
                <button type="submit" name="submit">Send Form</button>
            </div>
        </form>
    </div>
</body>
</html>