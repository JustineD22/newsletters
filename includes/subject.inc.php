<h1>Les Sujets</h1>
<?php 
$test = getSubject();
dump($test);


$html = "<table>";
$html .= "<tr>";
$html .= "<th>Id_Subject</th>";
$html .= "<th>Content</th>";
$html .= "</tr>";


for ($i = 0; $i < count($test); $i++){
    $html .= "<tr>";
    $html .= "<td>" . $test[$i]['ID_SUBJECT'] . "</td>";
    $html .= "<td>" . $test[$i]['SUBCONTENT'] . "</td>";
    $html .= "</tr>";
    $html .= "<tr>";
    $html .= "<td>" . $test[$i][1]['ID_SUBJECT'] . "</td>";
    $html .= "<td>" . $test[$i][1]['SUBCONTENT'] . "</td>";
    $html .= "</tr>";
}
    $html .= "</table>";
echo ($html);