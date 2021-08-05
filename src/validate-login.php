<?php
session_start();
include('db-connection.php');


$emailForm = $_POST['inputEmail'];
$passwordForm = $_POST['inputPassword'];
$userName = "";


$sql = "Select User_Name 
        From User 
        Where   User_Email = '$emailForm' 
                and User_Password = '$passwordForm' 
        Limit 1
    ";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $userName = $row['User_Name'];
  }

mysqli_close($conn);

unset($_SESSION['inputEmail']);
unset($_SESSION['inputPassword']);

if ($result->num_rows > 0) {
    $_SESSION['login'] = $userName;
} else {
    $_SESSION['validate'] = 'false';
}

header("Location: ../");

?>