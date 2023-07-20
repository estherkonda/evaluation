<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$admin = new Employe();
$repone = $admin->deleteTemoignage(array("id"=>$_GET['id']));
if ($repone==200){
    header('location:../../views/pages/employe.php?r=1');
}else{
    header('location:../../views/pages/employe.php?r=0');
}