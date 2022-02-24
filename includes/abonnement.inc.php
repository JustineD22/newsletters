<h1>Mes Abonnements</h1>
<br>
<h2>Mes Sujets préférés :</h2>
<br>

<?php
var_dump($_POST);

$test = getSubject();
//dump($test);

$html = "<form action='index.php?page=abonnement' method='post'>";
$html .= "<ul>";
for ($i = 0; $i < count($test); $i++){
    $string = implode(" ", $test[$i]);
    $html .= "<li>";
    $html .= "<label for=\"abonnement\">" . "$string";
    $html .= "</label>";
    $html .= "<input type= \"checkbox\" id=\"$string\" value=\"$string\" name=\"abo\">";
    $html .= "</li>";

}
$html .= "<li>";
$html .= "<input type=\"submit\" value=\"Valider\" name=\"valider\" />";
$html .= "</li>";
$html .= "</ul>";
$html .= "</form>";

echo($html);

if (isset($_POST['valider'])) {
    $abo = $_POST['abo'] ?? '';
    $erreur = array();

    if (strlen($abo) === 0)
    array_push($erreur, "Veuillez cocher un sujet");

    if (count($erreur) === 0) { 
        echo("envoi reussi");
    }
}
