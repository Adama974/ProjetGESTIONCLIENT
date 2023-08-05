<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="../Asset/CSS/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    require("../controller/confi.php");
    include('entete.php');
    include('barre.php');
    if (isset($_REQUEST['Nom'], $_REQUEST['Prenom'], $_REQUEST['Adresse'], $_REQUEST['Numero_tel'],$_REQUEST['Email'], $_REQUEST['Sexe'], $_REQUEST['Statut'] )){
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $nom = stripslashes($_REQUEST['Nom']);
        $nom = mysqli_real_escape_string($conn, $nom); 
        // récupérer le prenom et supprimer les antislashes ajoutés par le formulaire
        $prenom = stripslashes($_REQUEST['Prenom']);
        $prenom = mysqli_real_escape_string($conn, $prenom);
      // récupérer l'adresse et supprimer les antislashes ajoutés par le formulaire
        $adresse = stripslashes($_REQUEST['Adresse']);
        $adresse = mysqli_real_escape_string($conn, $adresse);
      // récupérer le numero de telephone et supprimer les antislashes ajoutés par le formulaire
        $telephone = stripslashes($_REQUEST['Numero_tel']);
        $telephone = mysqli_real_escape_string($conn, $telephone);
        // récupérer l'email' et supprimer les antislashes ajoutés par le formulaire
        $Email = stripslashes($_REQUEST['Email']);
        $Email = mysqli_real_escape_string($conn, $Email);
        // récupérer le sexe et supprimer les antislashes ajoutés par le formulaire
        $Sexe = stripslashes($_REQUEST['Sexe']);
        $Sexe = mysqli_real_escape_string($conn, $Sexe);
        // récupérer le statut et supprimer les antislashes ajoutés par le formulaire
        $Statut = stripslashes($_REQUEST['Statut']);
        $Statut = mysqli_real_escape_string($conn, $Statut);
    
      
        
        $query = "INSERT into `client` ( Nom, Prenom,Adresse, Numero_tel , Email, Sexe, Statut)
                    VALUES ('$nom', '$prenom','$adresse','$telephone','$Email','$Sexe','$Statut')";
        $res = mysqli_query($conn, $query);
    
        if($res){
          header('location:vide.php');
        }
    }
    ?>
    <div id="ba">
       
    
    <div id="formul">
    <form action="" method="post">
       <div> INSCRIPTION</div>
       <br>
       <label class="la">Nom:</label>
       <input type="text" name="Nom" required autocomplete="off"><br><br>
     
       <label class="la">Prénom:</label>
       <input type="text" name="Prenom" required autocomplete="off"><br><br>

       <label class="la">adresse:</label>
       <input type="text" name="Adresse" required autocomplete="off"><br><br>    

       <label class="la">Numero de téléphone:</label>
       <input type="number" name="Numero_tel" required autocomplete="off"><br><br>

       <label class="la">adresse mail:</label>
       <input type="email" name="Email" required autocomplete="off"><br><br>

       <label class="la">sexe:</label>
       <input type="text" name="Sexe" required autocomplete="off"><br><br>
               
       
       <label class="la">statut:</label>
       <input type="text" name="Statut" required autocomplete="off"><br><br>              
      
       
       
       <button type="submit" name="submit" id="inscrire" id="add"> Ajouter </button>
       </form>     
    </div>
    </div>
    </body>
</html>