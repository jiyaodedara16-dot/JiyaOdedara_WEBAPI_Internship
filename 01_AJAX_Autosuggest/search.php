<?php  
$conn = mysqli_connect('localhost','root','','intership');

$mode = $_GET['mode'];

$sql = "select * from intership where mode='$mode'";   

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo $row['stud_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact']; ?></td>
        <td><?php echo $row['mode']; ?></td>
    <tr>

<?php
}


?>