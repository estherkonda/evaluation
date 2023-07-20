<?php

class Admin extends Utilisateur implements AdminUser, Services, Horaire
{
     public function selectAllUser()
     {
        // TODO: Implement selectAllUser() method.
        $crud = new Crud();
        $response = $crud->selectAll("users");
        return $response;
    }

    public function selectOneUser($id_user)
    {
        // TODO: Implement selectOneUser() method.
        $crud = new Crud();
        $response = $crud->selectOne("users",$id_user);
        return $response;
    }

    //Utilisateur
    /**
     * @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function createUser($data): int
    {
        $crud = new \Crud();

        //verifier si l'utilisateur existe
        $checkUserData = array("email"=>$data['email']);
        $count = (int) $crud->count("users",$checkUserData);

        //si un compte existe
        if ($count<1){
            // Encoder le mot de passe en base64
            $field = array(
                "nom"=>$data['nom'],
                "prenom"=>$data['prenom'],
                "email"=>$data['email'],
                "mot_de_passe"=>base64_encode($data['mot_de_passe']),
                "type_compte"=>$data['type_compte'],
            );
            $statement = $crud->insert("users",$field);

            // Vérifier si l'insertion a réussi
            if ($statement > 0) {
                return 200; // créer avec succes
            }
        }

        return 500; //Erreur lors de l'exécution de l'application

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
    public function updateUser($data,$condition): int
    {
        $crud = new Crud();

        $update = $crud->update("users",$data,$condition);
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
    public function deleteUser($condition): int
    {
        $crud = new Crud();
        $response = $crud->delete("users",$condition);
        return $response;

    }

    //Service

    /**
     * @param $data
     * array K_V comme clause where pour qualifier la requete
     * @return int
     */
    public function createService($data): int
    {
        $crud = new Crud();
        $res = $crud->insert("services",$data);
        if ($res>0){
            return 200;
        }
        return 500;

    }

    /**
     * @param $data
     * @param $condition
     * @return int
     */
    public function updateService($data,$condition): int
    {
        $crud = new Crud();
        $update = $crud->update("services",$data,$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $condition
     * @return int
     */
    public function deleteService($condition): int
    {
        $crud = new Crud();
        $response = $crud->delete("services",$condition);
        return $response;

    }

    /**
     * @return bool|array
     * Au cas ou il n'ya pas de data la methode retrun false
     */
    public function selectAllService()
    {
        $crud = new Crud();
        $response = $crud->selectAll("services");
        return $response;
    }

    /**
     * @param $id_services
     * @return array|null
     * Au cas ou il n'ya pas de data la methode retrun null
     */
    public function selectOneService($id_services): ?array
    {
        $crud = new Crud();
        $response = $crud->selectOne("services",$id_services);
        return $response;
    }



    //Horaires

    /**
     * @return bool|array
     */
    public function selectAllHoraire()
    {
        // TODO: Implement selectAllHoraire() method.
        $crud = new Crud();
        $response = $crud->selectAll("horaires");
        return $response;
    }

    /**
     * @param $id_services
     * @return array|null
     */
    public function selectOneHoraire($id_horaire): ?array
    {
        // TODO: Implement selectOneHoraire() method.
        $crud = new Crud();
        $response = $crud->selectOne("horaires",$id_horaire);
        return $response;
    }

    /**
     * @param $data
     * @return int
     */
    public function createHoraire($data): int
    {
        // TODO: Implement createHoraire() method.
        $crud = new Crud();
        $count = $crud->count("horaires",array("jour"=>$data['jour']));
        if ($count<1){
            $res = $crud->insert("horaires",$data);
            if ($res>0){
                return 200;
            }
        }
        return 500;

    }

    /**
     * @param $data
     * @param $condition
     * @return int
     */
    public function updateHoraire($data, $condition): int
    {
        // TODO: Implement updateHoraire() method.
        $crud = new Crud();
        $update = $crud->update("horaires",$data,$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $condition
     * @return int
     */
    public function deleteHoraire($condition): int
    {
        // TODO: Implement deleteHoraire() method.
        $crud = new Crud();
        $response = $crud->delete("horaires",$condition);
        return $response;
    }

    /**
     * @param $condition
     * @return int
     */
    public function closeDay($condition): int
    {
        // TODO: Implement closeDay() method.
        $crud = new Crud();
        $update = $crud->update("horaires",array("status","0"),$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    public function openDay($condition): int
    {
        // TODO: Implement openDay() method.
        $crud = new Crud();
        $update = $crud->update("horaires",array("status","1"),$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }



}