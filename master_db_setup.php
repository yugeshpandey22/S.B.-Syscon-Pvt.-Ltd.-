<?php
/**
 * MASTER DATABASE SETUP SCRIPT
 * Run this file to create ALL required tables for the project.
 */
require_once 'config/database.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h1>Database Setup Status</h1>";

    // 1. ADMIN USERS TABLE
    $sql = "CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "✔ Table 'admin_users' checked/created.<br>";

    // Insert Default User if not exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM admin_users WHERE username = 'admin'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $pass = password_hash('admin123', PASSWORD_DEFAULT);
        $conn->prepare("INSERT INTO admin_users (username, password) VALUES ('admin', '$pass')")->execute();
        echo "&nbsp;&nbsp;➥ Default admin user created (Pass: admin123)<br>";
    }

    // 2. PRINCIPALS TABLE (Brands)
    $sql = "CREATE TABLE IF NOT EXISTS principals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        logo VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "✔ Table 'principals' checked/created.<br>";

    // 3. PRICE LISTS TABLE
    $sql = "CREATE TABLE IF NOT EXISTS price_lists (
        id INT AUTO_INCREMENT PRIMARY KEY,
        principal_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (principal_id) REFERENCES principals(id) ON DELETE CASCADE
    )";
    $conn->exec($sql);
    echo "✔ Table 'price_lists' checked/created.<br>";

    // 4. CONTACT QUERIES TABLE
    $sql = "CREATE TABLE IF NOT EXISTS contact_queries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        subject VARCHAR(200),
        message TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "✔ Table 'contact_queries' checked/created.<br>";

    // 5. PRODUCTS TABLE (If you want to use it later)
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        category VARCHAR(100),
        description TEXT,
        image VARCHAR(255),
        price DECIMAL(10,2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "✔ Table 'products' checked/created.<br>";

    echo "<hr><h3>All tables are set up correctly!</h3>";

} catch(PDOException $e) {
    echo "<h3 style='color:red'>Error: " . $e->getMessage() . "</h3>";
}
?>
