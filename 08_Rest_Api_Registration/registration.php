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
            <div id="msg"></div>
            <h1>User Registration</h1>
            <p>Using Rest API</p>
            <form id="form">

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username">
                    <span class="error" id="username_err"></span>
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter email">
                    <span class="error" id="email_err"></span>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password">
                    <span class="error" id="password_err"></span>
                </div>
                <button type="submit" name="submit" class="btn" id="btn">
                    Save User
                </button>

            </form>

        </div>

    </div>
<script>
document.getElementById("form").addEventListener("submit", async function (e) {
    e.preventDefault();

    document.getElementById("username_err").innerHTML = "";
    document.getElementById("email_err").innerHTML = "";
    document.getElementById("password_err").innerHTML = "";

    try{
        const frmdata = {
            username: document.getElementById("username").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value
        };

        let response = await fetch("api/register.php", {
            method: "POST", 
            headers: { "Content-type": "Application/json" },
            body: JSON.stringify(frmdata)
        });

        let text = await response.text();
        console.log(text);

        let data = JSON.parse(text);
        console.log(data);

        if(data.status){
            document.getElementById("msg").innerHTML = data.msg;
            document.getElementById("msg").classList.add("msg-success");
            document.getElementById("form").reset();
        }else{
            if(data.errors.username){
                document.getElementById("username_err").innerHTML = data.errors.username;
            }

            if(data.errors.email){
                document.getElementById("email_err").innerHTML = data.errors.email;
            }

            if(data.errors.password){
                document.getElementById("password_err").innerHTML = data.errors.password;
            }
        }
    }catch(error){
    console.error(error);
    alert(error.message);
    }
    
})
</script>
</body>
</html>