<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "prisminspacedb";

try {

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    $e->getMessage();
}

if (!isset($_SESSION["login_username"])) {
    echo("User is not logged in.");
}

$login_username = $_SESSION["login_username"]; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profilepicture'])) {

    $file = $_FILES['profilepicture'];
    $directory = 'userprofiles/';

    $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
    
    $newfilename = "user_" . $login_username . "_" . time() . "." . $fileExt;

    $targetpath = $directory . $newfilename;
    

    if (move_uploaded_file($file['tmp_name'], $targetpath)) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET profilepicture = :profilepicture WHERE username = :login_username");
            $stmt->execute([
                'profilepicture' => $newfilename,
                'login_username' => $login_username
            ]);

            echo "You have updated your profile picture updated successfully!";
        } catch (PDOException $e) {
            e->getMessage();
        }
    } else {
        echo("Double womp womp.");
    }
}

// display the profile picture., do not mess with this
try {

    $stmt = $pdo->prepare("SELECT profilepicture FROM users WHERE username = :login_username");
    $stmt->execute(['login_username' => $login_username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user['profilepicture'])) {
        $profilepicture = $user['profilepicture'];
    } else {
        $profilepicture = 'usericon.svg';
    }
    echo "<img src='userprofiles/" . htmlspecialchars($profilepicture) . "' alt='Profile Picture' width='150'>";
} catch (PDOException $e) {
    $e->getMessage();
}
?>

