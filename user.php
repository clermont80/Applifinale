<?php

class user
{

    //Propiétés
    private $_idprog;
    private $_idprog2;
    private $_IdUser;
    private $_Pseudo;
    private $_Mdp;
    private $_taille;
    private $_poids;
    
    //Construct

    public function __construct($Pseudo,$Mdp,$taille,$poids)
    {
    
        $this->_Pseudo = $Pseudo;
        $this->_Mdp = $Mdp;
        $this->_taille = $taille;
        $this->_poids = $poids;
        $this->_idprog = 0; //pour l'instant
        $this->_idprog2 = 0; //pour l'instant

    }

    //Methodes

    public function getIdUser()
    {
        return $this->_IdUser;
    }
    
    public function getPseudo()
    {
        return $this->_Pseudo;
        
    }

    public function getMdp()
    {
        echo $this->_Mdp;

    }

    public function GetId()
    {
        return $this->_IdUser;
    }

    public function ajouteidprog($idprog)
    {
        $this->_idprog=$idprog;
    }

    public function AjoutProgramme($IdProgramme,$IdProgramme2, $Base, $IdUser)
    {
        $Base->query('UPDATE user set id_programme ="'.$IdProgramme.'", id_programme2="'.$IdProgramme2.'" where id_user="'.$IdUser.'"');
    }


    public function metenbase($bdd)
    {
        $id= $this->_idprog;
        $id2=$this->_idprog2;
        $pseudo= $this->_Pseudo;
        $mdp= $this->_Mdp;
        $poids= $this->_poids;
        $taille = $this->_taille;

        $bdd->query('INSERT INTO user (id_programme,id_programme2,pseudo,motdepasse,poids,taille) VALUES ("'.$id.'","'.$id2.'","'.$pseudo.'","'.$mdp.'","'.$poids.'","'.$taille.'")');//insertion d'une nouvelle ligne dans la bdd
        $donnees = $bdd->query('SELECT id_user from user where pseudo ="'.$pseudo.'" AND motdepasse ="'.$mdp.'"');

        $tab = $donnees->fetch();
        $this->_IdUser = $tab['id_user'];

    }

    public function log($idprog,$idprog2,$iduser,$pseudo,$mdp,$taille,$poids) //sorte de second constructeur
    {
        $this->_idprog = $idprog;
        $this->_idprog2 = $idprog2;
        $this->_IdUser = $iduser;
        $this->_Pseudo = $pseudo;
        $this->_Mdp = $mdp;
        $this->_taille = $taille;
        $this->_poids = $poids;

    }

    public function afficheruser()
    {
        echo "vous avez affaire à l'utilisateur numéro  ".$this->_IdUser." il/elle s'appelle ".$this->_Pseudo." et a choisi le programme numéro ".$this->_idprog." et le programme ".$this->_idprog2."";
    }




}

?>