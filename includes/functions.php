<?php
require_once __DIR__ . '/../config/app.php';

function e($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

function redirect_with_message($page, $type, $message) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['flash_type'] = $type;
    $_SESSION['flash_message'] = $message;
    header("Location: " . $page);
    exit();
}

function show_flash() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!empty($_SESSION['flash_message'])) {
        $type = $_SESSION['flash_type'] ?? 'info';
        echo '<div class="alert alert-' . e($type) . '">' . e($_SESSION['flash_message']) . '</div>';
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
    }
}

function old($key, $default = '') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return $_SESSION['old'][$key] ?? $default;
}

function set_old($data) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['old'] = $data;
}

function clear_old() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['old']);
}

function upload_image($fieldName = 'image') {
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $original = $_FILES[$fieldName]['name'];
    $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed, true)) {
        return null;
    }

    $filename = time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $targetDir = __DIR__ . '/../uploads/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $target = $targetDir . $filename;
    if (move_uploaded_file($_FILES[$fieldName]['tmp_name'], $target)) {
        return 'uploads/' . $filename;
    }

    return null;
}

function generate_otp() {
    return (string)random_int(100000, 999999);
}

function sendOtpEmail($email, $otp) {
    // In DEV_MODE we don't rely on real email delivery.
    if (DEV_MODE) {
        return true;
    }

    $subject = "Your OTP for " . APP_NAME;
    $message = "Your OTP is: " . $otp;
    $headers = "From: no-reply@example.com\r\n";
    return mail($email, $subject, $message, $headers);
}

function template_name($no) {
    $map = [
        1 => 'Professional Blue',
        2 => 'Modern Clean',
        3 => 'Classic Minimal',
        4 => 'Creative Sidebar',
        5 => 'Elegant Dark Header'
    ];
    return $map[(int)$no] ?? 'Template';
}

function fetch_resume_full(mysqli $conn, int $resumeId, int $userId) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM resume WHERE resume_id = ? AND user_id = ?");
    mysqli_stmt_bind_param($stmt, "ii", $resumeId, $userId);
    mysqli_stmt_execute($stmt);
    $resume = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);

    if (!$resume) {
        return null;
    }

    $resume['skills'] = [];
    $q = mysqli_prepare($conn, "SELECT * FROM skills WHERE resume_id = ? ORDER BY skill_id ASC");
    mysqli_stmt_bind_param($q, "i", $resumeId);
    mysqli_stmt_execute($q);
    $res = mysqli_stmt_get_result($q);
    while ($row = mysqli_fetch_assoc($res)) $resume['skills'][] = $row;
    mysqli_stmt_close($q);

    $resume['soft_skills'] = [];
    $q = mysqli_prepare($conn, "SELECT * FROM soft_skills WHERE resume_id = ? ORDER BY soft_skill_id ASC");
    mysqli_stmt_bind_param($q, "i", $resumeId);
    mysqli_stmt_execute($q);
    $res = mysqli_stmt_get_result($q);
    while ($row = mysqli_fetch_assoc($res)) $resume['soft_skills'][] = $row;
    mysqli_stmt_close($q);

    $resume['work'] = [];
    $q = mysqli_prepare($conn, "SELECT * FROM work WHERE resume_id = ? ORDER BY work_id ASC");
    mysqli_stmt_bind_param($q, "i", $resumeId);
    mysqli_stmt_execute($q);
    $res = mysqli_stmt_get_result($q);
    while ($row = mysqli_fetch_assoc($res)) $resume['work'][] = $row;
    mysqli_stmt_close($q);

    $resume['education'] = [];
    $q = mysqli_prepare($conn, "SELECT * FROM education WHERE resume_id = ? ORDER BY education_id ASC");
    mysqli_stmt_bind_param($q, "i", $resumeId);
    mysqli_stmt_execute($q);
    $res = mysqli_stmt_get_result($q);
    while ($row = mysqli_fetch_assoc($res)) $resume['education'][] = $row;
    mysqli_stmt_close($q);

    return $resume;
}
