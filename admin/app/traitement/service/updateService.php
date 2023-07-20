<?php
const BASE_PATH  = '../../../../';
include "../../../../core/autoloader.php";

$admin = new Admin();
if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
    $filename = $_FILES["file"]["name"];
    $filetype = $_FILES["file"]["type"];
    $filesize = $_FILES["file"]["size"];
    $random_name = uniqid() . "service." . pathinfo($filename, PATHINFO_EXTENSION);

    $uploadDir = "images/";
    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir . $random_name);

    $data = array(
        "titre"=>$_POST['titre'],
        "contenu"=>$_POST['contenu'],
        "image"=>$random_name,
        "date_creation"=>date('Y-m-d'),
    );
    $repone = $admin->updateService($data,array("id"=>$_POST['id']));
    if ($repone==200){
        header('location:../../views/pages/service.php?r=1');
    }else{
        header('location:../../views/pages/service.php?r=0');
    }
}else{
    $data = array(
        "titre"=>$_POST['titre'],
        "contenu"=>$_POST['contenu'],
        "date_creation"=>date('Y-m-d'),
    );
    $repone = $admin->updateService($data,array("id"=>$_POST['id']));
    if ($repone==200){
        header('location:../../views/pages/service.php?r=1');
    }else{
        header('location:../../views/pages/service.php?r=0');
    }
}

