<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "prisminspacedb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo("Database error: " . $e->getMessage());
}

if (!isset($_SESSION['login_username'])) {
    echo("You must be logged in to view your transaction history.");
}

$userid = $_SESSION['login_userid'];

$stmt = $conn->prepare("SELECT * FROM orders WHERE userid = :userid");
$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$orders) {
    echo("<p>No orders found for user ID $userid.</p>");
}

try {
    $sql = "SELECT r.receiptid, o.date, r.totalprice 
            FROM orders o
            JOIN receipts r ON o.orderid = r.orderid
            WHERE o.userid = :userid
            ORDER BY o.date DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$transactions) {
        echo "<p>No transaction history found.</p>";
    } else {
        echo "<h2>Transaction History</h2>";
        foreach ($transactions as $row) {
            echo "<p>Receipt no. {$row['receiptid']}<br>";
            echo "Date: {$row['date']}<br>";
            echo "Total Price: {$row['totalprice']}</p>";

            
        }
        echo "Go back to <a href='userPage.php'>userpage</a>";
    }

} catch (PDOException $e) {
    echo "Error fetching transactions: " . $e->getMessage();
}
?>
