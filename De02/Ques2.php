//           =======2.1=======
<?php
$vietnamRivers = ["Red River", "Mekong River", "Da River", "Dong Nai River", "Perfume River", "Saigon River"];
echo "<ul>";
$i = 0;
while ($i < count($vietnamRivers)) {
    echo "<li>" . $vietnamRivers[$i] . "</li>";
    $i++;
}
echo "</ul>";
?>



//          =======2.2=======
<?php
$exchange2025 = [
    'USD' => 25200,
    'EUR' => 27200,
    'SGD' => 18800,
    'AUD' => 16800
];

echo "<dl>";

foreach ($exchange2025 as $key => $value) {
    $newValue = round($value * 1.035);
    echo "<dt>$key</dt><dd>" . number_format($newValue) . " VND</dd>";
}

echo "</dl>";
?>