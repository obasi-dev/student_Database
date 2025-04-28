<?php
require "../classes/User.php";

$user = new User();
$id = $_GET['deleteid'] ?? null;

if($id){
    $user->delete($id);

    header("Location: ../index.php");
}