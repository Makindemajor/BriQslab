<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriQsLab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="navbar">
        <a href="index.php" class="logo">BriQsLab</a>
        <button class="nav-toggle" aria-label="Toggle menu">&#9776;</button>
        <ul class="nav-links">
            <li><a href="index.php" <?= $current==='index.php'?'class="active"':'' ?>>Home</a></li>
            <li><a href="about.php" <?= $current==='about.php'?'class="active"':'' ?>>Who We Are</a></li>
            <li><a href="courses.php" <?= $current==='courses.php'?'class="active"':'' ?>>Courses</a></li>
            <li><a href="contact.php" <?= $current==='contact.php'?'class="active"':'' ?>>Contact Us</a></li>
            <li><a href="enroll.php" class="btn-enroll">Enroll Now</a></li>
        </ul>
    </nav>
</header>
