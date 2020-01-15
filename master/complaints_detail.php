<?php

include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
//$fn->checkLogin();

if ($fn->isLogin()) {
    $results = $fn->getComplaints($_GET['id']);
    echo json_encode($results);
    $fn->activeComplaints($_GET['id']);
} else {
    echo json_encode('{}');
}
