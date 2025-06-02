<?php
include "ad_home.php";
?>
<?php
$conn = new mysqli("localhost", "root", "", "sigma_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uploadMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['resources'])) {
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];
    $file = $_FILES['resources'];

    if ($file['error'] === 0 && $file['type'] === 'application/pdf') {
        $uploadDir = "resources/";
        if (!is_dir($uploadDir)) mkdir($uploadDir);

        $fileName = basename($file['name']);
        $filePath = $uploadDir . time() . "_" . $fileName;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $stmt = $conn->prepare("INSERT INTO Resources (file_name, file_path, subject_id, class_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $fileName, $filePath, $subject_id, $class_id);
            if ($stmt->execute()) {
                $uploadMessage = "Resource uploaded successfully!";
            } else {
                $uploadMessage = "Database error.";
            }
        } else {
            $uploadMessage = "Failed to move uploaded file.";
        }
    } else {
        $uploadMessage = "Only PDF files are allowed.";
    }
}

// Load subjects and classes
$subjects = $conn->query("SELECT * FROM subject");
$classes = $conn->query("SELECT * FROM class");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Resource</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            padding: 40px;
        }
        .upload-form {
            background: #fff;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .upload-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .upload-form label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        .upload-form input, .upload-form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .upload-form button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            border: none;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .upload-form .message {
            margin-top: 15px;
            text-align: center;
            color: green;
        }
    </style>
</head>
<body>

<div class="upload-form">
    <h2>Upload PDF Resource</h2>

    <?php if ($uploadMessage): ?>
        <div class="message"><?= htmlspecialchars($uploadMessage) ?></div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label>Subject:</label>
        <select name="subject_id" required>
            <option value="">-- Select Subject --</option>
            <?php while($sub = $subjects->fetch_assoc()): ?>
                <option value="<?= $sub['subject_id'] ?>"><?= htmlspecialchars($sub['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Class:</label>
        <select name="class_id" required>
            <option value="">-- Select Class --</option>
            <?php while($cls = $classes->fetch_assoc()): ?>
                <option value="<?= $cls['class_id'] ?>"><?= htmlspecialchars($cls['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Upload PDF:</label>
        <input type="file" name="resource" accept="application/pdf" required>

        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>