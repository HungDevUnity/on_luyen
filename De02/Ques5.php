<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $phone = $_POST['phone'];

    // Validate name
    if (strlen($name) < 6) {
        $errors[] = "Name must be at least 6 characters";
    }

    // Validate phone
    if (!preg_match('/^(09|08|03|07)[0-9]{8}$/', $phone)) {
        $errors[] = "Invalid phone number";
    }

    // Validate file
    if ($_FILES['photo']['error'] == 0) {
        $file = $_FILES['photo'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, ['jpg','jpeg','png'])) {
            $errors[] = "Invalid file type";
        }

        if ($file['size'] > 3 * 1024 * 1024) {
            $errors[] = "File too large";
        }
    } else {
        $errors[] = "File required";
    }

    if (empty($errors)) {
        $newName = time() . "_" . basename($file['name']);
        move_uploaded_file($file['tmp_name'], "profiles/" . $newName);

        echo "Success!<br>";
        echo "Name: $name<br>";
        echo "Phone: $phone<br>";
        echo "File: $newName<br>";
        echo "<img src='profiles/$newName' width='200'>";
    } else {
        foreach ($errors as $e) {
            echo "<p style='color:red'>$e</p>";
        }
    }
}
?>

<form method="POST" enctype="multipart/form-data">
Name: <input type="text" name="fullname"><br>
Phone: <input type="text" name="phone"><br>
Photo: <input type="file" name="photo"><br>
<button type="submit">Submit</button>
</form>