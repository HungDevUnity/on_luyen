//=====1.1  ======
<?php
$yourFullName = "Le The Hung";
$yourBirthYear = 2004;
$currentYear = 2025;

$age = $currentYear - $yourBirthYear;

echo "My name is $yourFullName, I was born in $yourBirthYear, so I am $age years old in 2025.";
?>


//=====1.2  ======
<?php
function convertTemperature($celsius, $toFahrenheit) {
    if ($toFahrenheit) {
        return $celsius * 9/5 + 32;
    } else {
        return $celsius + 273.15;
    }
}

// Test
echo "25°C = " . convertTemperature(25, true) . "°F<br>";
echo "25°C = " . convertTemperature(25, false) . " K";
?>