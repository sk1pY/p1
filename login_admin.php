<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $pass = $_POST['password'];
    $log = $_POST['login'];

    $query = "SELECT * from admin where login ='$log'and passworrd ='$pass'";
    $res = mysqli_query($link,$query) or die(mysqli_error($link));
    $result = mysqli_fetch_assoc($res);
    var_dump($result);
    if($result){
        $_SESSION['admin'] = 'admin';
        header('location: /');
    }
}
?>

<form action="" method="post">
    <input type="text" name = 'login'>
    <input type="password" name = 'password'>
    <input type="submit" name ='submit'>
</form>
