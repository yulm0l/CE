<?php
include("../conn.php");

if ($_POST) {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Inicio de sesión
        session_start();
        extract($_POST);

        $selAcc = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$username' AND exmne_password='$pass'");
        $selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

        if ($selAcc->rowCount() > 0) {
            $_SESSION['examineeSession'] = array(
                'exmne_id' => $selAccRow['exmne_id'],
                'examineenakalogin' => true
            );
            $res = array("res" => "success");
        } else {
            $res = array("res" => "invalid");
        }
    } 
    elseif (isset($_POST['action']) && $_POST['action'] === 'register') {
        // Registro
        extract($_POST);

        $selExamineeFullname = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_fullname='$fullname'");
        $selExamineeEmail = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$email'");

        if($gender == "0")
        {
          $res = array("res" => "noGender");
        }
        else if($course == "0")
        {
          $res = array("res" => "noCourse");
        }
        else if($year_level == "0")
        {
          $res = array("res" => "noLevel");
        }
        else if($selExamineeFullname->rowCount() > 0)
        {
          $res = array("res" => "fullnameExist", "msg" => $fullname);
        }
        else if($selExamineeEmail->rowCount() > 0)
        {
          $res = array("res" => "emailExist", "msg" => $email);
        }
        else
        {
          $insData = $conn->query("INSERT INTO examinee_tbl(exmne_fullname,exmne_course,exmne_gender,exmne_birthdate,exmne_year_level,exmne_email,exmne_password) VALUES('$fullname','$course','$gender','$bdate','$year_level','$email','$password')  ");
          if($insData)
          {
            $res = array("res" => "success", "msg" => $email);
          }
          else
          {
            $res = array("res" => "failed");
          }
        }
      }
    }
        

echo json_encode($res);

?>
