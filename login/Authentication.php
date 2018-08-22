<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 8/2/2018
 * Time: 8:59 PM
 */
require_once __DIR__.'/../../db/DBConnection.php';
ini_set('session_max', 10*60);
session_set_cookie_params(10*60);
session_start();

$Username=$_POST("username");
$Password=$_POST("password");

$connection=(new DBConnection())->getConnection();
$connection->query("select * from user where username='{$Username}' AND password='{$Password}'");
if($connection->affected_rows === 1) {
    header("location:index.html");
}else{
    header("location:login.html");
}

