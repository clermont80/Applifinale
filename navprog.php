<?php

require("user.php"); 
require("programme.php");
session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/identification.css">
    <title>Identification</title>
</head>

<body>
    <!-- HEADER -->
    <div class="page">
        <header>
            <div class="container">
                <nav class="menu-bar">

                    <!--TITRE-->

                    <div class="logo">
                        <ul class="titre">
                            <li class="name">
                                <a>
                                    <h1>Fitness<span class="tld">.php</span></h1>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--MENU DROIT-->

                    <div class="menu">
                        <ul class="right">
                            <li><b><a href="#">Decouvrir</a></li></b>
                            <li><b><a href="conseil.php">Conseil</a></li></b>
                            <li><b><a href="apropos.php">A propos</a></li></b>
                            <li><b><a href="identification.php">S'identifier</a></li></b>
                            <li><b><a href="connexion.php">Se connecter</a></li></b>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </nav>
        </header>
    </div>
    </div>
    <!-- FIN HEADER -->
<?php
    try 
    {
        $Base =  new PDO('mysql:host=localhost; dbname=base_sportive; charset=utf8', 'root', '');

    }catch (Exception $erreurs) {

        echo "erreur à la base impossible";
    }


    if(isset($_POST['username'], $_POST['password'],$_POST['password2'], $_POST['taille'], $_POST['poids'])) 
    {
        if($_POST['password']==$_POST['password2'])
        {
            $MdpUser =  $_POST['password']; 
            $IdentifiantUser = $_POST['username'];
            $Taille = $_POST['taille'];
            $Poids = $_POST['poids'];
        
            $User = new user($IdentifiantUser,$MdpUser,$Taille,$Poids);
            $User->metenbase($Base);
            $_SESSION['id'] = $User->GetId();
        }
       
    
    }

   $IdUser = $_SESSION['id'];
   
   
    
    $Data =  $Base->query('SELECT * from user WHERE id_user ='.$IdUser);
    $TabData = $Data->fetch();
    $Poids = $TabData['poids']; 
    $Taille = $TabData['taille'];
    $imc = $Poids / ($Taille * $Taille); //calcul de l'imc OK
    
      
   

   
?>


<form action="" method="post"> <?php

        if ($imc >= 25 && $imc <= 30) { ?>
        <input type="checkbox" id="tonic1" name="prog[]" value="1">
        <label for="coding">Tonic</label> <?php
                                                    } ?>

    <p></p>
    <?php if ($imc >= 18.35 && $imc < 27) { ?>
        <input type="checkbox" id="intensif1" name="prog[]" value="2">
        <label for="coding">Intensif</label> <?php
                                            } ?>
    <p></p>

    <?php if ($imc >= 16.5 && $imc < 26) { ?>
        <input type="checkbox" id="forme1" name="prog[]" value="3">
        <label for="coding">Forme</label>
    <?php
    }
    ?>
    <input type="submit" value="Envoyer"></input>
</form>


<?php

$i=0;
$IdProgramme2;

if(isset($_POST['prog']) && isset($IdUser)) 
{
    foreach ($_POST['prog'] as $idprog) 
    {
       
        if($i==0)
        {
             $IdProgramme = $idprog;
             echo "<div> l'id du programme 1 est :".$IdProgramme."</div>";
        }

        if($i==1)
        {
              $IdProgramme2 = $idprog;
              echo "<div> l'id du programme 2 est :".$IdProgramme2."</div>";
        }

        $i++;
       
       
    }
    
    $user1 = new user(1,1,1,1); //cet objet n'est qu'un tampon
    
    if(!isset($IdProgramme2))   //si l'utilisateur n'a choisi qu'un seul programme
    {
        $IdProgramme2=0;
    }

    

    $user1->AjoutProgramme($IdProgramme,$IdProgramme2, $Base, $IdUser);
    //$Base->query('DELETE from user where id_programme=0');

}
    ?>
        <form action="conseil.php" method="POST">
                <input type="submit" value="accéder à mon compte" />
        </form>
    <?php


?>