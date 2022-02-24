<h1>Les Sujets</h1>
<?php 
$test = getSubject();
// dump($test);

$html = "<table>";
$html .= "<tr>";
$html .= "<th> CONTENT </th>";
$html .= "</tr>";

for ($i = 0; $i < count($test); $i++){
    $html .= "<tr>";
    $html .= "<td>" . $test[$i]['SUBCONTENT'] . "</td>";
    $html .= "</tr>";
}
    $html .= "</table>";

    echo ($html);