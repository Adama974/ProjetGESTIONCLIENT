<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un nom de la base de données</title>
    <link href="../Asset/CSS/styl.css" rel="stylesheet">
</head>
<body>
    <div id="leform">
        <p>entrer les données suivantes avec prudences <br> s'il le faut <a href="../Views/voir_utilisateur.phph">Voir liste</a> pour verifier</p>
    <form method="post" action="">
        <label for="nom_a_supprimer">Entrez le nom à supprimer :</label>
        <input type="text" name="nom_a_supprimer" id="nom_a_supprimer">
        <br>
        <br>
        <label for="prenom_a_supprimer">Entrez le prenom à supprimer :</label>
        <input type="text" name="prenom_a_supprimer" id="prenom_a_supprimer">
        <br>
        <br>
        <input type="submit" value="Supprimer" class="su">
    </form>
    </div>
    <?php
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Étape 2 : Récupérer et valider l'entrée de l'utilisateur
        $nom_a_supprimer = $_POST["nom_a_supprimer"];
        $prenom_a_supprimer = $_POST["prenom_a_supprimer"];
    
        // Étape 3 : Établir une connexion à la base de données
        $servername = "mysql-projetgestionclientele.alwaysdata.net";
        $username = "323101_adama";
        $password = "mbaye@7112A";
        $database = "projetgestionclientele_sql";

        // Créer la connexion
        $conn = new mysqli($servername, $username, $password, $database);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // Étape 4 : Construire et exécuter une requête SQL pour supprimer le nom sélectionné
        

        $sql = "DELETE FROM client WHERE Prenom = '$prenom_a_supprimer' and Nom='$nom_a_supprimer'";
        $result = $conn->query($sql);
        // Étape 4 : Vérifier le résultat de la requête
        
        if ($conn->query($sql) === TRUE) {
            echo "<p id='don'>Nom supprimé avec succès.</p>";
        } else{
            echo "Erreur lors de la suppression du nom <br> Verifiez bien si vous avez bien les informations <a id='lili'>voir liste </a> " . $conn->error;
        }
        // Étape 6 : Fermer la connexion à la base de données
        $conn->close();
    }

    ?>
</body>
</html>