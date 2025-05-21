<?php
session_start();
include 'db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
       
        if ($password === $user['password']) {
            if ($user['status'] === 'approved') {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];

                if ($user['role'] === 'student') {
                    header("Location: student_reg.php");
                } elseif ($user['role'] === 'teacher') {
                    header("Location: teacher_reg.php");
                } else {
                    echo "Unknown user role.";
                }
                exit();
            } else {
                echo "Your account is not approved yet.";
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Email not found.";
    }
} else {
    echo "Please enter both email and password.";
}
?>
