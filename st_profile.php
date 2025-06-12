<?php
session_start();

// DB Connection
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// Handle email login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && !isset($_POST['update'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = ? AND role = 'student'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if ($student) {
        $_SESSION['student'] = $student;
    } else {
        $error = "Student not found for the given email.";
    }
}

// Handle profile update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_SESSION['student']['id'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $whatsapp_no = $_POST['whatsapp_no'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_contact = $_POST['guardian_contact'];
    $admission_date = $_POST['admission_date'];

    $sql = "UPDATE users SET address=?, dob=?, whatsapp_no=?, guardian_name=?, guardian_contact=?, admission_date=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $address, $dob, $whatsapp_no, $guardian_name, $guardian_contact, $admission_date, $id);

    if ($stmt->execute()) {
        // Refresh session data
        $res = $conn->query("SELECT * FROM users WHERE id = $id");
        $_SESSION['student'] = $res->fetch_assoc();
        $success = "Profile updated successfully.";
    } else {
        $error = "Failed to update profile.";
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: student_profile.php");
    exit();
}

// Edit mode toggle
$editMode = isset($_GET['edit']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

<?php if (!isset($_SESSION['student'])): ?>
    <!-- Email Form -->
    <div class="col-md-6 offset-md-3">
        <h3 class="text-center mb-4">Enter Student Email</h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" class="bg-white p-4 shadow rounded">
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="student@example.com" required>
            </div>
            <button class="btn btn-success w-100">View Profile</button>
        </form>
    </div>

<?php else: ?>
    <?php $s = $_SESSION['student']; ?>

    <!-- Fetch Enrolled Subjects -->
    <?php
        $student_id = $s['id'];
        $enrolled_subjects = [];

        $sub_sql = "SELECT subject.name 
                    FROM enrollments 
                    JOIN subject ON enrollments.subject_id = subject.subject_id 
                    WHERE enrollments.student_id = ?";
        $sub_stmt = $conn->prepare($sub_sql);
        $sub_stmt->bind_param("i", $student_id);
        $sub_stmt->execute();
        $sub_result = $sub_stmt->get_result();

        while ($row = $sub_result->fetch_assoc()) {
            $enrolled_subjects[] = $row['name'];
        }
    ?>

    <!-- Profile Card -->
    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Student Profile: <?= htmlspecialchars($s['name']) ?></h4>
            <div>
                <?php if ($editMode): ?>
                    <a href="student_profile.php" class="btn btn-secondary">Cancel</a>
                <?php else: ?>
                    <a href="?edit=1" class="btn btn-primary">Edit Profile</a>
                <?php endif; ?>
                <a href="?logout=1" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($editMode): ?>
            <!-- Edit Form -->
            <form method="POST">
                <input type="hidden" name="update" value="1">
                <table class="table table-bordered">
                    <tr><th>Email</th><td><?= htmlspecialchars($s['email']) ?></td></tr>
                    <tr><th>Address</th><td><input type="text" name="address" class="form-control" value="<?= htmlspecialchars($s['address']) ?>"></td></tr>
                    <tr><th>Date of Birth</th><td><input type="date" name="dob" class="form-control" value="<?= htmlspecialchars($s['dob']) ?>"></td></tr>
                    <tr><th>WhatsApp No</th><td><input type="text" name="whatsapp_no" class="form-control" value="<?= htmlspecialchars($s['whatsapp_no']) ?>"></td></tr>
                    <tr><th>Guardian Name</th><td><input type="text" name="guardian_name" class="form-control" value="<?= htmlspecialchars($s['guardian_name']) ?>"></td></tr>
                    <tr><th>Guardian Contact</th><td><input type="text" name="guardian_contact" class="form-control" value="<?= htmlspecialchars($s['guardian_contact']) ?>"></td></tr>
                    <tr><th>Admission Date</th><td><input type="date" name="admission_date" class="form-control" value="<?= htmlspecialchars($s['admission_date']) ?>"></td></tr>
                </table>
                <button class="btn btn-success">Update Profile</button>
            </form>
        <?php else: ?>
            <!-- Profile View -->
            <table class="table table-bordered">
                <tr><th>Email</th><td><?= $s['email'] ?></td></tr>
                <tr><th>Address</th><td><?= $s['address'] ?? 'N/A' ?></td></tr>
                <tr><th>Date of Birth</th><td><?= $s['dob'] ?? 'N/A' ?></td></tr>
                <tr><th>WhatsApp No</th><td><?= $s['whatsapp_no'] ?? 'N/A' ?></td></tr>
                <tr><th>Guardian Name</th><td><?= $s['guardian_name'] ?? 'N/A' ?></td></tr>
                <tr><th>Guardian Contact</th><td><?= $s['guardian_contact'] ?? 'N/A' ?></td></tr>
                <tr><th>Admission Date</th><td><?= $s['admission_date'] ?? 'N/A' ?></td></tr>
                <tr>
                    <th>Enrolled Subjects</th>
                    <td>
                        <?php if (!empty($enrolled_subjects)): ?>
                            <ul class="mb-0">
                                <?php foreach ($enrolled_subjects as $subject): ?>
                                    <li><?= htmlspecialchars($subject) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            No subjects enrolled.
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
<?php endif; ?>

</div>
</body>
</html>
