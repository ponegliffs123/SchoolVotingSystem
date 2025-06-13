<?php
session_start();
include 'includes/conn.php';

$conn = new mysqli("localhost", "root", "", "votesystem");

// Check if connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if admin session is set
if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
    die("Error: Admin session is not set!");
}

$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
$query = $conn->query($sql);

// Debugging: Check if query failed
if (!$query) {
    die("SQL Error: " . $conn->error);
}

$user = $query->fetch_assoc();
	
?>