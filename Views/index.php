<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="../Asset/CSS/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    require("../controller/confi.php");
    include('../Views/entete.php');
    ?>
    
    <div id="barr">
        <a href="../Views/ajouter_utilisateur.php"><img src="../Asset/IMG/add-user.png" id="aj_ut" ></a>
        <a href="../Views/voir_utilisateur.php"><img src="../Asset/IMG/group.png" id="ut" ></a>
        <a href="../Views/modifier_utilisateur.php"><img src="../Asset/IMG/user-avatar.png" id="ed_ut" ></a>
        <a href="../Views/supprimer_utilisateur.php"><img src="../Asset/IMG/del_user.png" id="del_ut" ></a>
        <a href="../Views/ajouter_utilisateur.php" id="ad_ut">Ajouter client(s)</a>
        <a href="../Views/voir_utilisateur.php"id="v_ut">Voir client(s)</a>
        <a href="../Views/modifier_utilisateur.php" id="mod_ut">Modifier client(s)</a>
        <a href="../Views/supprimer_utilisateur.php" id="sup_ut">Supprimer client(s)</a>


    </div>
    
    </body>
</html>