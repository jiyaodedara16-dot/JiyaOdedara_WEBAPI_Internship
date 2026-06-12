<?php
    $conn = mysqli_connect('localhost','root','','intership');
    $selecterr = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
    <link rel="stylesheet" href="style.css">
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