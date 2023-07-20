<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$admin = new Admin();
$data = $_POST;
unset($data['id']);
$repone = $admin->updateUser($_POST,array("id"=>$_POST['id']));

if ($repone==200){
    header('location:../../views/pages/admin.php?r=1');
}else{
    header('location:../../views/pages/admin.php?r=0');
}