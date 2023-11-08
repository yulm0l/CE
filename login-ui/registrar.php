<?php
include_once 'conn.php';
ob_start();

if (!empty($_POST["registro"])) {
    if (empty($_POST["exmne_fullname"]) || empty($_POST["exmne_course"]) || empty($_POST["exmne_gender"]
        || empty($_POST["exmne_birthdate"]) || empty($_POST["exmne_email"]) || empty($_POST["exmne_password"])
    )) {
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        $fullname = $_POST["exmne_fullname"];
        $course = $_POST["exmne_course"];
        $gender = $_POST["exmne_gender"];
        $bdate = $_POST["exmne_birthdate"];
        $email = $_POST["exmne_email"];
        $password = $_POST["exmne_password"];

        // Aquí se asume que ya tienes una conexión a la base de datos llamada $conn
        // Debes usar consultas preparadas para prevenir SQL injection
        // Supongamos que la tabla en la base de datos se llama 'examinee_tbl'

        $stmt = $conn->prepare("INSERT INTO examinee_tbl (exmne_fullname, exmne_course, exmne_gender, exmne_birthdate, exmne_email, exmne_password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fullname, $course, $gender, $bdate, $email, $password);

        if ($stmt->execute()) {
            echo '<div class="success">Usuario registrado correctamente</div>';
        } else {
            echo '<div class="alerta">Error al registrar el usuario</div>';
        }
        $stmt->close();
    }
}
?>
