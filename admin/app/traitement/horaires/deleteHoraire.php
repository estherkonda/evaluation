<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$admin = new Admin();
$repone = $admin->deleteHoraire(array("id"=>$_GET['id']));
if ($repone==200){
    header('location:../../views/pages/horaires.php?r=1');
}else{
    header('location:../../views/pages/horaires.php?r=0');
}