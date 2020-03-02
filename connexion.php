<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/identification.css">
    <title>Connexion</title>
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
    <!-- Formulaire de connexion -->
    
       
    <div class="form2">
        <h2>Connexion</h2>
        <form action="connexion.php" method="POST">
            <p></p>
            <label>Identifiant :</label>
            <input type="text" name="username_user_enregistre"  />
            <p></p>
            <label>Mot de passe :</label>
            <input type="password" name="password_user_enregistre"  />
            <p></p>
            <input type="submit" />
        </form>
    </div>
<?php
    
    try
    {
        $Base =  new PDO('mysql:host=localhost; dbname=base_sportive; charset=utf8', 'root', '');

    }
    catch (Exception $erreurs) 
    {

        echo "erreur à la base impossible";
    }
    

    if(isset($_POST['username_user_enregistre'])&&isset($_POST['password_user_enregistre']))
    {
        $donnee = $Base->query('SELECT id_user,id_programme,id_programme2,pseudo,motdepasse,poids,taille from user where pseudo="'.$_POST['username_user_enregistre'].'" AND motdepasse="'.$_POST['password_user_enregistre'].'"');
        $tabid = $donnee->fetch();
        $Iduser = $tabid['id_user'];
        $idprog = $tabid['id_programme'];
        $idprog2 = $tabid['id_programme2'];
        $name = $tabid['pseudo'];
        $mdp = $tabid['motdepasse'];
        $poids = $tabid['poids'];
        $taille = $tabid['taille'];

        if($_POST['username_user_enregistre']== $name && $_POST['password_user_enregistre']==$mdp)
        {
            echo "vous êtes connecté";
            ?> 
                <form action="conseil.php" method="POST">
                     <input type="submit" value="accéder à mon compte" />
                </form>
            <?php
        }
        else
        {
            echo "mauvais id ou mauvais mot de passe";
        }
    }
  
?>

</body>
</html>