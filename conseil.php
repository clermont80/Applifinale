<?php require("user.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Fitness</title>
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
            $base = new PDO('mysql:host=localhost; dbname=base_sportive; charset=utf8', 'root', '');
            $DonneeBruteUser = $base->query('SELECT * from user');
            $TabUserIndex = 0;
            
            while ($tab = $DonneeBruteUser->fetch())
            {
                $TabUser[$TabUserIndex] = new user(1,1,1,1);
                $TabUser[$TabUserIndex]->log($tab['id_programme'],$tab['id_programme2'],$tab['id_user'],$tab['pseudo'],$tab['motdepasse'],$tab['poids'],$tab['taille']);
                $TabUser[$TabUserIndex++];    
                     
            }
        }
        catch(Exception $erreurs)
        {
             echo "echec de la connexion à la base";
        }

        
    ?>
    
    <form action="" method="post">
        <select name="users" id="userselect">
            <?php 
                foreach($TabUser as $objetUser) //les valeurs des objets sont bonnes
                { 
                    echo '<option value="'.$objetUser->GetId().'">'.$objetUser->getPseudo().'</option>';
                    
                }
            ?>
        </select>
        <input type="submit"></input>
    </form>

    <?php

        if(isset($_POST["users"]))
        {
            foreach($TabUser as $objetUser)
            {
                if($objetUser->GetId()==$_POST["users"])
                {
                    $objetUser->afficheruser();            
                }        
            }      
        }
        else
        {
             echo "Aucun user selectionné";
        }
    ?>
             
</body>
</html>