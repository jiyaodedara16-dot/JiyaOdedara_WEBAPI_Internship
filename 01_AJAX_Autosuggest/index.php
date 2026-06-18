<!-- <?php
    $conn = mysqli_connect('localhost','root','','intership');
    $selecterr = '';
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
    <link rel="stylesheet" href="style.css">
    <!-- <style>
        body{
            min-height: 100vh;
            width: 100%;
            background-color: #123;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box{
            width: 60%;
            padding: 20px;
            background: #ffffff71;
            text-align: center;
            border-radius: 20px;
        }
        .value{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 10px;
            font-size:25px;
        }
        .mode{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .internship-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            border-radius:10px;
        }

        .internship-table thead {
            background: rgba(17, 34, 51, 0.77);
            color: white;
            font-size: 18px;
        }
        table{
            margin-top:10px;
        }

        .internship-table th,
        .internship-table td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size:18px;
        }

        .internship-table tbody{
            background:#123;
        }

        .internship-table tbody tr:hover {
            background: #f5f7ff52;
        }

        .internship-table th {
            font-weight: 600;
        }

        .internship-table tbody tr:last-child td {
            border-bottom: none;
        }
        body{
            position: relative;
        }
        .btn{
            border:none;
            outline:none;
            height:40px;
            width: 100px;
            margin:10px 0;
            border-radius:30px;
            background:rgba(255,255,255,0.5);
            color:#0F2854;
            margin: 10px 0 0 10px;
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
        .error{
            color:red;
        }
        select{
            width: 200px;
            height: 35px;
            background: #ffffff;
            color: #1d2d3f;
            border: 2px solid #4d5c6d;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: 0.3s ease;
        }

        select:hover{
            border-color: #ffffff;
        }

        select:focus{
            box-shadow: 0 0 8px rgba(255,255,255,0.3);
        }

        option{
            background: #f5f5f5;
            font-size:12px;
            color: #1d2d3f !important;
        }
    </style> -->
</head>
<body>
    <a href="../html.html"><button class="btn">Back</button></a>
    <div class="box">
        <div class="heading">
            <h1>Ajax Demo</h1>
            <form action="" method='get'>
            <div class="mode">
                <select name="mode" id="mode">
                    <option value="Select Mode" class="value">Select Mode</option>
                    <option value="Online" class="value">Online</option>
                    <option value="Onsite" class="value">Onsite</option>
                    <option value="Hybrid" class="value">Hybrid</option>
                </select>
            </div>
            <button type="button" class="btn" onclick="findStudents()">Give Users</button>
            </form>
            <div class="table">
                <table class="internship-table">
                    <thead>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Mode</th>
                    </thead>
                    <tbody class="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function findStudents(){
            var mode = document.getElementById("mode").value;
            if(mode != 'Select Mode'){
                let xhr = new XMLHttpRequest();
                xhr.open('GET','search.php?mode='+encodeURIComponent(mode),true);
                xhr.onreadystatechange = function (){
                    
                    if(xhr.readyState == 4 && xhr.status == 200){
                        document.querySelector(".tbody").innerHTML = xhr.responseText;
                    }
                }

                xhr.send();
            }else{
                alert('Please Select Mode!');  
            }
            
        }
    </script>
</body>
</html>