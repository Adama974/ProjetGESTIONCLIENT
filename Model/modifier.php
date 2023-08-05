<!DOCTYPE html>
<html>
<head>
    <title>Modifier une ligne de la base de données</title>
</head>
<body>
    <div id="wadj">
    <form method="post" action="">
        <label for="nom">Entrez le nom de la personne à modifier :</label>
        <br>
        <input type="text" name="nom" id="nom" required>
        <br>
        <br>
        <label for="prenom">Entrez le prénom de la personne à modifier :</label>
        <br>
        <input type="text" name="prenom" id="prenom" required>*
        <br>
        <br>
    
        <label for="nouveau_nom">Nouveau nom :</label>
        <br>
        <input type="text" name="nouveau_nom" id="nouveau_nom" required>
        <br>
        <br>
        <label for="nouveau_prenom">Nouveau prénom :</label>
        <br>
        <input type="text" name="nouveau_prenom" id="nouveau_prenom" required>
        <br>
        <br>
        <label for="nouveau_nom">nouvel adresse :</label>
        <br>
        <input type="text" name="nouvel_ad" id="nouvel_ad" required>
        <br>
        <br>
        <label for="nouveau_prenom">Nouveau_num :</label>
        <br>
        <input type="number" name="nouveau_num" id="nouveau_num" required>
        <br>
        <br>
        <label for="nouveau_nom">Nouveau email :</label>
        <br>
        <input type="email" name="nouveau_email" id="nouveau_email" required>
        <br>
        <br>
        <label for="nouveau_prenom">Nouveau sexe :</label>
        <br>
        <input type="text" name="nouveau_sexe" id="nouveau_sexe" required>
        <br>
        <br>
        <label for="nouveau_statut">Nouveau statut :</label>
        <br>
        <input type="text" name="nouveau_statut" id="nouveau_statut" required>
        <br>
        <br>
        
        <input type="submit" value="Modifier" class="su">
    </form>
    </div>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Étape 2 : Récupérer et valider les entrées de l'utilisateur
        $nom_a_modifier = $_POST["nom"];
        $prenom_a_modifier = $_POST["prenom"];
        $nouveau_nom = $_POST["nouveau_nom"];
        $nouveau_prenom = $_POST["nouveau_prenom"];
        $nouvel_ad = $_POST["nouvel_ad"];
        $nouveau_num = $_POST["nouveau_num"];
        $nouveau_email = $_POST["nouveau_email"];
        $nouveau_sexe = $_POST["nouveau_sexe"];
        $nouveau_statut = $_POST["nouveau_statut"];
        
        // Vous pouvez ajouter ici d'autres validations, si nécessaire, selon le format des valeurs que vous attendez.

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

        // Étape 4 : Construire et exécuter une requête SQL pour mettre à jour la ligne dans la base de données
        // Supposons que vous souhaitez mettre à jour les valeurs dans une table appelée "ma_table"
        // et que le nom est stocké dans une colonne "colonne_nom" et le prénom dans une colonne "colonne_prenom".

        $sql = "UPDATE client SET Nom = '$nouveau_nom', Prenom = '$nouveau_prenom',Adresse='$nouvel_ad',Numero_tel='$nouveau_num',email='$nouveau_email',Sexe='$nouveau_sexe',Statut='$nouveau_statut' WHERE Nom = '$nom_a_modifier' AND Prenom = '$prenom_a_modifier'";
        if ($conn->query($sql) === TRUE) {
            echo "La ligne a été mise à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de la ligne : " . $conn->error;
        }

        // Étape 5 : Fermer la connexion à la base de données
        $conn->close();
    }
    ?>
</body>
</html>
