<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$temoignage = new Employe();
$data = $_POST;
unset($data['id']);
$repone = $temoignage->updateTemoignage($_POST,array("id"=>$_POST['id']));

if ($repone==200){
    header('location:../../views/pages/employe.php?r=1');
}else{
    header('location:../../views/pages/employe.php?r=0');
}