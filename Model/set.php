<?php
// Inclure le fichier autoload.php de dompdf
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
    $dompdf->stream("div_to_pdf.pdf");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Télécharger une div comme PDF en PHP</title>
</head>
<body>
    <h1>Télécharger une div comme PDF en PHP</h1>
    <div id="ma_div">
        <!-- Contenu de la div que vous souhaitez télécharger -->
        <h2>Titre de la div</h2>
        <p>Contenu de la div que vous souhaitez télécharger sous forme de PDF.</p>
    </div>
    <form method="post" action="">
        <!-- Champ caché pour envoyer le contenu de la div au serveur lors du téléchargement -->
        <input type="hidden" name="contenu_div" id="contenu_div">
        <button type="submit">Télécharger en PDF</button>
    </form>

    <script>
        // Lorsque le formulaire est soumis, récupérez le contenu de la div et mettez-le dans le champ caché
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            var contenuDiv = document.getElementById("ma_div").innerHTML;
            document.getElementById("contenu_div").value = contenuDiv;
            event.target.submit();
        });
    </script>
</body>
</html>
