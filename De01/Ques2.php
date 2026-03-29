// ===== 2.1 =====

    <?php
// Cities
$cities = ["Ha Noi", "Hai Phong", "Da Nang", "Ho Chi Minh", "Can Tho"];

echo "<ul>";
foreach ($cities as $city) {
    echo "<li>$city</li>";
}
echo "</ul>";

// Scores
$scores = [
    'Math' => 8.5,
    'Physics' => 7.0,
    'English' => 9.2,
    'History' => 6.8
];

echo "<table border='1'>
<tr><th>Subject</th><th>New Score</th></tr>";

foreach ($scores as $subject => $score) {
    $newScore = min($score + 0.5, 10);
    echo "<tr><td>$subject</td><td>$newScore</td></tr>";
}

echo "</table>";
?>

// ===== 2.2 =====

<?php
$students = [
    ['id' => 'SV001', 'name' => 'Nguyen Van A', 'age' => 20, 'grade' => 8.5],
    ['id' => 'SV002', 'name' => 'Tran Thi B', 'age' => 19, 'grade' => 9.2],
    ['id' => 'SV003', 'name' => 'Le Van C', 'age' => 21, 'grade' => 6.5],
    ['id' => 'SV004', 'name' => 'Pham Thi D', 'age' => 22, 'grade' => 5.5]
];

echo "<table border='1'>
<tr><th>ID</th><th>Name</th><th>Age</th><th>Grade</th></tr>";

foreach ($students as $sv) {
    echo "<tr>
            <td>{$sv['id']}</td>
            <td>{$sv['name']}</td>
            <td>{$sv['age']}</td>
            <td>{$sv['grade']}</td>
          </tr>";
}

echo "</table>";
?>

