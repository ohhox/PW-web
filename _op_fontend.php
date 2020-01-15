<?php

if (!empty($_POST)) {
    require_once "./ReCaptcha.php";
// Register API keys at https://www.google.com/recaptcha/admin
    $siteKey = "6Lfr4EEUAAAAAG4-kVVr_8cwSbUYwWcqAXr0Gz0A";
    $secret = "6Lfr4EEUAAAAAJW0nUJtP6ZrG676bTi-4I2SHD7F";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
    $lang = "th";
// The response from reCAPTCHA
    $resp = null;
// The error code from reCAPTCHA, if any
    $error = null;
    $reCaptcha = new ReCaptcha($secret);
// Was there a reCAPTCHA response?
    if ($_POST["g-recaptcha-response"]) {
        $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
        );
    }



    if ($resp != null && $resp->success) {
        $data = $_POST;
        unset($data['g-recaptcha-response']);
        include './_conn.php';
        include './functionx.php';
        $fn = new functionx();
        $fn->insert('complaints', $data);
        header('Location: complaints_complete.php');
    } else {
        header('Location: complaints.php');
    }
} else {
    header('Location: complaints.php');
}

