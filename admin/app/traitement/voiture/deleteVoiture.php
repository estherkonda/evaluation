<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$employe = new Employe();
$repone = $employe->deleteVoiture(array("id"=>$_GET['id']));
if ($repone==200){
    header('location:../../views/pages/voiture.php?r=1');
}else{
    header('location:../../views/pages/voiture.php?r=0');
}