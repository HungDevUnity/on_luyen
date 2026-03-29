<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $name = $_POST['name'];
    $email = $_POST['email'];

    if (strlen($name) < 5) {
        $errors[] = "Name must be at least 5 characters";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    if ($_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
            $errors[] = "Invalid file type";
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            $errors[] = "File too large";
        }
    } else {
        $errors[] = "File required";
    }

    if (empty($errors)) {
        $newName = time() . "_" . $file['name'];
        move_uploaded_file($file['tmp_name'], "uploads/" . $newName);
        echo "Upload success: $newName";
    } else {
        foreach ($errors as $e) {
            echo "<p style='color:red'>$e</p>";
        }
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Image: <input type="file" name="image"><br>
    <button type="submit">Upload</button>
</form>