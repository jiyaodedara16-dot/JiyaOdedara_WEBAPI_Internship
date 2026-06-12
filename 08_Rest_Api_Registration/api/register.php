<?php
    $conn = mysqli_connect("localhost", "root", "", "intership");
    if(!$conn){
        die("connect failed");
    }

    header("Content-Type: Application/json");
    $errors = [];
    $formData = file_get_contents("php://input", true);
    $data = json_decode($formData, true);

    $username = trim($data['username']) ?? '';
    $email = trim($data['email']) ?? '';
    $password = trim($data['password']) ?? '';

    if(empty($username)){
        $errors['username'] = "Username is required";
    }else if(!preg_match("/^[A-Za-z ]{2,}$/",$username)){
        $errors['username'] = "Invalid username entered";
    }

    if(empty($email)){
        $errors['email'] = "Email is required";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Invalid email entered";
    }

    if(empty($password)){
        $errors['password'] = "Password is required";
    }elseif(!preg_match("/^[A-Za-z0-9]{6,8}$/",$password)){
        $errors['password'] = "Password should must of 6 to 8 characters";
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $check = mysqli_query($conn, "select * from users where email='$email'");
    if(mysqli_num_rows($check) > 0){
        $errors['email'] = "Email alreay registered";
    }

    if(!empty($errors)){
        echo json_encode(["status" => false, "errors"=> $errors]);
        exit;
    }

    $insertSql = "insert into users (username, email, password) values ('$username', '$email', '$password')";
    $result = mysqli_query($conn, $insertSql);
    if($result){
        echo json_encode([ "status"=> true, "msg"=>'Registration Successful!']);
    }else{
        echo json_encode([ "status"=> false, "msg"=>'Failed to logging in DB!']);
    }

?>