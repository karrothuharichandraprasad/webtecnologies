<html>

<body>
    <?php
    $errors = array();
    $name = $_POST["un"];
    $email = $_POST["e"];
    $gen = $_POST["r"];
    $rel = $_POST["rel"];
    $dob = $_POST["dob"];
    $lang = $_POST["lang[]"];
    $adr = $_POST["add"];
    $pwd = $_POST["pas"];
    $cpwd = $_POST["pas1"];
    $uppercase = preg_match('@[A-Z]@', $pas);
    $lowercase = preg_match('@[a-z]@', $pas);
    $number    = preg_match('@[0-9]@', $pas);
    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "Hari_91";
    $connection = mysqli_connect($host, $uname, $password, $dbname);
    if (isset($connection)) {
        echo "Database connected successfully" . "<br>";
        if
