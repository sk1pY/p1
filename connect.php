<?php
    session_start();
    $host = 'localhost';
    $name = 'root';
    $pass = 'root';
    $db = 'p1';

    $link = mysqli_connect($host,$name,$pass,$db) or die(mysqli_error($link));
?>
<html><!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></html>
