<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $pass = $_POST['pass'];
    $log = $_POST['user'];

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
<link rel="stylesheet" href="auth.css">
<!--<form action="" method="post">-->
<!--    <input type="text" name = 'user'>-->
<!--    <input type="password" name = 'password'>-->
<!--    <input type="submit" name ='submit'>-->
<!--</form>-->
<form action="" method="post">
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id = 'name' name ='user'  type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id = 'pass' name ='pass'  type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="group">
                    <input name = 'submit' type="submit" class="button" value="Sign In">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">Forgot Password?</a>
                </div>
            </div>
            <div class="sign-up-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email Address</label>
                    <input id="pass" type="text" class="input">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>