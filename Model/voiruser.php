<!DOCTYPE html>
<html>
<head>
    <title>Afficher le contenu de la table</title>
    <link href="../Asset/CSS/style.css" rel="stylesheet">
</head>
<body>
    <div id="tform">

    <?php
    require_once '../dompdf/autoload.inc.php';

    use Dompdf\Dompdf;
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer le contenu de la div depuis le formulaire
        $contenu_div = $_POST["contenu_div"];
    
        // Créer une instance de dompdf
        $dompdf = new Dompdf();
    
        // Générer le PDF en utilisant le contenu de la div
        $dompdf->loadHtml($contenu_div);
        $dompdf->render();
    
        // Télécharger le PDF
        $dompdf->stream("liste_client.pdf");
        exit();
    }
    // Connexion à la base de données
        $servername = "mysql-projetgestionclientele.alwaysdata.net";
        $username = "323101_adama";
        $password = "mbaye@7112A";
        $database = "projetgestionclientele_sql";

    $connexion = new mysqli($servername, $username, $password, $database);

    // Vérifier la connexion à la base de données
    if ($connexion->connect_error) {
        die("Erreur de connexion à la base de données : " . $connexion->connect_error);
    }

    // Requête pour récupérer le contenu de la table
    $requete = "SELECT * FROM client"; 

    // Exécution de la requête
    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        // Afficher le contenu de la table dans un tableau
        echo "<table border='2'>
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>adresse</th>
                <th>numero de telephone</th>
                <th>email</th>
                <th>sexe</th>
                <th>statut</th>
                
            </tr>";

        while ($ligne = $resultat->fetch_assoc()) {
            echo"<div id='tes'>";
            echo "<tr>";
            echo "<td>" . $ligne["Nom"] . "</td>"; 
            echo "<td>" . $ligne["Prenom"] . "</td>";
            echo "<td>" . $ligne["Adresse"] . "</td>"; 
            echo "<td>" . $ligne["Numero_tel"] . "</td>"; 
            echo "<td>" . $ligne["Email"] . "</td>"; 
            echo "<td>" . $ligne["Sexe"] . "</td>"; 
            echo "<td>" . $ligne["Statut"] . "</td>";  
            echo "</tr>";
            echo "</div>";
        }

        echo "</table>";
    } else {
        echo "<h1>La table est vide.</h1>";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
    ?>
    <form method="post" action="">
        <!-- Champ caché pour envoyer le contenu de la div au serveur lors du téléchargement -->
        <input type="hidden" name="contenu_div" id="contenu_div">
        <button type="submit" id="btyy">Télécharger en PDF</button>
    </form>
    </div>
    

    <script>
        // Lorsque le formulaire est soumis, récupérez le contenu de la div et mettez-le dans le champ caché
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            var contenuDiv = document.getElementById("tform").innerHTML;
            document.getElementById("contenu_div").value = contenuDiv;
            event.target.submit();
        });
    </script>
</body>
</html>