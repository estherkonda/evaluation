<?php

class Employe extends Utilisateur implements Voiture, Temoignage
{

    /**
     *  @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function createVoiture($data)
    {
        // TODO: Implement createVoiture() method.
        $crud = new Crud();
        $res = $crud->insert("voitures",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }

    /** @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function createVoitureImages($data)
    {
        // TODO: Implement createVoitureImages() method.
        $crud = new Crud();
        $res = $crud->insert("galerie_image_voiture",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }


    public function selectVoitureImage($condition)
    {
        // TODO: Implement selectVoitureImage() method.
        $crud = new Crud();
        $response = $crud->selectByFieldWhereOR("galerie_image_voiture",$condition);
        return $response;
    }


    /**
     * @param $data
     * array K_V pour sotocher les data dans lá table
     * @param $condition
     * array K_V comme clause where pour qualifier la requete
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function updateVoiture($data, $condition)
    {
        // TODO: Implement updateVoiture() method.
        $crud = new Crud();
        $update = $crud->update("voitures",$data,$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $condition
     * array K_V comme clause where pour qualifier la requete
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function deleteVoiture($condition)
    {
        // TODO: Implement deleteVoiture() method.
        $crud = new Crud();
        $response = $crud->delete("voitures",$condition);
        return $response;

    }

    /**
     * @return bool|array
     * Au cas ou il n'ya pas de data la methode retrun null
     */
    public function selectAllVoiture()
    {
        // TODO: Implement selectAll() method.
        $crud = new Crud();
        $response = $crud->selectAll("voitures");
        return $response;
    }

    public function selectAllContact()
    {
        $crud = new Crud();
        $response = $crud->selectAll("contact");
        return $response;
    }

    /**
     * @param $id_voiture
     * @return array|null
     */
    public function selectOneVoiture($id_voiture)
    {
        // TODO: Implement selectOne() method.
        $crud = new Crud();
        $response = $crud->selectOne("voitures",$id_voiture);
        return $response;
    }



    /**
     * @param $pattern
     * @return bool|array
     */
    public function searchVoiture($pattern)
    {
        // TODO: Implement searchVoiture() method.
        $crud = new Crud();
        $response = $crud->selectWithLike("voitures",$pattern);
        return $response;
    }

    public function selectAllTemoignage()
    {
        // TODO: Implement selectAll() method.
        $crud = new Crud();
        $response = $crud->selectAll("temoignage");
        return $response;
    }

    /**
     * @param $condition
     * @return int
     */
    public function validateTemoignage($condition)
    {
        $crud = new Crud();
        $update = $crud->update("temoignage",array("status","1"),$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $data
     * @param $condition
     * @return int
     */
    public function updateTemoignage($data, $condition)
    {
        $crud = new Crud();
        $update = $crud->update("temoignage",$data,$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    public function deleteTemoignage($condition)
    {
        $crud = new Crud();
        $response = $crud->delete("temoignage",$condition);
        return $response;

    }


    /**
     * @param $condition
     * @return int
     */
    public function desactivateTemoignage($condition)
    {
        $crud = new Crud();
        $update = $crud->update("temoignage",array("status","0"),$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $data
     * @return int
     */

    public function createTemoignage($data)
    {
        // TODO: Implement createTemoignage() method.
        $crud = new Crud();
        $res = $crud->insert("temoignage",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }



}