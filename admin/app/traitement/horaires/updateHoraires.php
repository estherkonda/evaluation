<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$admin = new Admin();
$data = $_POST;
unset($data['id']);
$repone = $admin->updateHoraire($_POST,array("id"=>$_POST['id']));

if ($repone==200){
    header('location:../../views/pages/horaires.php?r=1');
}else{
    header('location:../../views/pages/horaires.php?r=0');
}