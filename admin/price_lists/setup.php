<?php
require_once '../../config/database.php';

try {
    // Create principals table
    $sql = "CREATE TABLE IF NOT EXISTS principals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        logo VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "Principals table created successfully.<br>";

    // Create price_lists table
    $sql = "CREATE TABLE IF NOT EXISTS price_lists (
        id INT AUTO_INCREMENT PRIMARY KEY,
        principal_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (principal_id) REFERENCES principals(id) ON DELETE CASCADE
    )";
    $conn->exec($sql);
    echo "Price Lists table created successfully.<br>";

    // Insert dummy data if empty (Optional based on user request)
    // Check if empty
    $stmt = $conn->query("SELECT COUNT(*) FROM principals");
    if ($stmt->fetchColumn() == 0) {
        // Insert Schneider and BCH placeholders
        $sql = "INSERT INTO principals (id, name, logo) VALUES 
        (1, 'Schneider Electric', 'uploads/principals/schneider.png'),
        (2, 'BCH Electric Limited', 'uploads/principals/bch.png')";
        $conn->exec($sql);
        echo "Inserted initial principals.<br>";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
