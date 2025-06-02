<?php
include "st_home.php";
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch resources with subject and class info
$sql = "SELECT r.*, s.name AS name, c.name AS name 
        FROM resources r
        JOIN subject s ON r.subject_id = s.subject_id
        JOIN class c ON r.class_id = c.class_id
        ORDER BY r.uploaded_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Resources</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 40px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .resource-table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .resource-table th, .resource-table td {
            padding: 14px 20px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        .resource-table th {
            background-color: #007bff;
            color: #fff;
        }
        .download-btn {
            background: #28a745;
            color: white;
            padding: 6px 12px;
            border: none;
            text-decoration: none;
            border-radius: 4px;
        }
        .download-btn:hover {
            background-color: #218838;
        }
        .no-data {
            text-align: center;
            color: #777;
            padding: 40px;
        }
    </style>
</head>
<body>

<h2>Available Resources</h2>

<?php if ($result->num_rows > 0): ?>
    <table class="resource-table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Class</th>
                <th>File Name</th>
                <th>Uploaded At</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['file_name']) ?></td>
                <td><?= htmlspecialchars(date("Y-m-d H:i", strtotime($row['uploaded_at']))) ?></td>
                <td><a class="download-btn" href="<?= htmlspecialchars($row['file_path']) ?>" download>Download</a></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="no-data">No resources available at the moment.</div>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>