<?php
$studentName = "Le The Hung";
$studentAge = 20;
$studyYear = 2;

echo "My name is $studentName, I am $studentAge years old, and I am in year $studyYear of my studies.";
?>

<?php
function calculateCircleArea($radius) {
    return M_PI * pow($radius, 2);
}

$radius = 7.5;
$area = calculateCircleArea($radius);

echo "The area of the circle with radius $radius is: $area";
?>