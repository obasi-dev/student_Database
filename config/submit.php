<?php
require "../classes/User.php";

$user = new User();

if ($_SERVER['REQUEST_METHOD']==="POST") {
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $matric = htmlspecialchars(trim($_POST['matric']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $dept = htmlspecialchars(trim($_POST['dept']));
    $level = htmlspecialchars(trim($_POST['level']));
    $address = htmlspecialchars(trim($_POST['address']));

    $errors = $user->validate($firstname,$lastname,$email,$matric,$gender,$dob,$dept,$level,$address);
    if (empty($errors)) {
        $create = $user->create($firstname,$lastname,$email,$matric,$gender,$dob,$dept,$level,$address);
        if ($create) {
            header("location: ../index.php");
        }
    }
}