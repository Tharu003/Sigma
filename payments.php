<?php
// Database සම්බන්ධතාවය
$host = 'localhost';
$db   = 'sigma_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
            p.payment_id,
            s.full_name AS student_name,
            t.full_name AS teacher_name,
            sub.name AS subject_name,
            p.amount,
            p.payment_date,
            p.payment_month,
            p.payment_mode
        FROM payments p
        JOIN student s ON p.student_id = s.st_id
        JOIN teacher t ON p.teacher_id = t.teacher_id
        JOIN subject sub ON p.subject_id = sub.subject_id
        ORDER BY p.payment_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Payments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Payments Overview</h2>
    <table>
        <tr>
            <th>Payment ID</th>
            <th>Student Name</th>
            <th>Teacher Name</th>
            <th>Subject</th>
            <th>Amount (LKR)</th>
            <th>Payment Date</th>
            <th>Payment Month</th>
            <th>Payment Mode</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['payment_id']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['teacher_name']}</td>
                        <td>{$row['subject_name']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['payment_date']}</td>
                        <td>{$row['payment_month']}</td>
                        <td>{$row['payment_mode']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No payment records found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
