//=====3.1=====
<?php
class Student {
    private $id, $name, $age, $grade;

    public function __construct($id, $name, $age, $grade) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getGrade() { return $this->grade; }

    public function getRank() {
        if ($this->grade >= 9) return "Excellent";
        elseif ($this->grade >= 7) return "Good";
        elseif ($this->grade >= 5) return "Average";
        else return "Weak";
    }
}
?>


//=====3.3=====
<?php
$students = [
    new Student("SV001", "Nguyen Van A", 20, 8.5),
    new Student("SV002", "Tran Thi B", 19, 9.2),
    new Student("SV003", "Le Van C", 21, 6.5),
    new Student("SV004", "Pham Thi D", 22, 4.5)
];

echo "<table border='1'>
<tr><th>ID</th><th>Name</th><th>Age</th><th>Grade</th><th>Rank</th></tr>";

foreach ($students as $sv) {
    echo "<tr>
        <td>{$sv->getId()}</td>
        <td>{$sv->getName()}</td>
        <td>{$sv->getAge()}</td>
        <td>{$sv->getGrade()}</td>
        <td>{$sv->getRank()}</td>
    </tr>";
}

echo "</table>";
?>