<?php
session_start();
include("../conn.php");

extract($_POST);


$selExaminee = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$username'");
if ($selExaminee->rowCount() > 0) {
    $userData = $selExaminee->fetch(PDO::FETCH_ASSOC);
    $hashedPassword = $userData['exmne_password'];

    if (password_verify($pass, $hashedPassword)) {
        $_SESSION['examineeSession'] = array(
            'exmne_id' => $userData['exmne_id'],
            'examineenakalogin' => true
        );
        $res = array("res" => "success");
    } else {
        $res = array("res" => "invalid");
    }
} else {
    $res = array("res" => "invalid");
}

echo json_encode($res);
?>
