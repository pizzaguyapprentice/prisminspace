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
        echo("WOmp womp: " . $e->getMessage());
    }

    if (!isset($_SESSION['login_username'])) {
        echo("You must be logged in to view your transaction history.");
    }
    
    $userid = $_SESSION['login_username'];
    
    try {
        //REceitps has userid in orders
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
            echo "<table border='1'>
                    <tr>
                        <th>Receipt ID</th>
                        <th>Date</th>
                        <th>Total Price</th>
                    </tr>";
            foreach ($transactions as $row) {
                echo "<tr>
                        <td>{$row['receiptid']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['totalprice']}</td>
                      </tr>";
            }
            echo "</table>";
        }
    } catch (PDOException $e) {
        echo "Error fetching transactions: " . $e->getMessage();
    }
?>
