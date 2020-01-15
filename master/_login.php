<?php

if (!empty($_POST)) {
    include "../_conn.php";
    $db = new DATABASE();
    $username = clean($_POST['username']);
    $password = clean($_POST['password']);

    if ($_POST['type'] == 'staff') {

        $query = $db->mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password' ");

        if ($query->num_rows > 0) {
            $userInformation = $query->fetch_object();
            setcookie('a', $userInformation->user_id, time() + (3600 * 24));
            setcookie('t', 'e', time() + (3600 * 24));
            header("Location: index.php");
        } else {
            header("Location: login.php?error=1");
        }
    } else {
        $query = $db->mysqli->query("SELECT * FROM student WHERE student_code='$username' AND password='$password' ");

        if ($query->num_rows > 0) {
            $userInformation = $query->fetch_object();
            setcookie('a', $userInformation->student_id, time() + (3600 * 24));
            setcookie('t', 's', time() + (3600 * 24));
            header("Location: index.php");
        } else {
            header("Location: login.php?error=1");
        }
    }
} else {
    echo "1";
}

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

?>