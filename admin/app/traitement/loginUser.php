<?php
const BASE_PATH  = '../../../';
include "../../../core/autoloader.php";

$email = $_POST['email'];
$password = $_POST['password'];
$user = new Utilisateur();
$reponse = $user->login($email,$password);
if ($reponse == 404){
    header('location:../views/pages/login.php?er');
}
if ($reponse=="admin"){
    header('location:../views/pages/admin.php');
}

if ($reponse=="employe"){
    header('location:../views/pages/employe.php');
}

