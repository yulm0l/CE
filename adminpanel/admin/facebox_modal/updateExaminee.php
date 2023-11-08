
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Actualizar <b>( <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>Nombre completo</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['exmne_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Género</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selExmne['exmne_gender']; ?></option>
          <option value="male">Hombre</option>
          <option value="female">Mujer</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Cumpleaños</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["exmne_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Nivel</legend>
        <?php 
            $exmneCourse = $selExmne['exmne_course'];
            $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exCourse">
           <option value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$exmneCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>
     <div class="form-group">
        <legend>Correo</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['exmne_email']; ?>" >
     </div>

      <?php
         $hashedPassword = password_hash($selExmne['exmne_password'], PASSWORD_DEFAULT);
         ?>

         <div class="form-group">
            <legend>Contraseña</legend>
            <input type="password" name="exPass" class="form-control" required="" value="<?php echo $hashedPassword; ?>">
         </div>


            <div class="form-group">
               <legend>Status</legend>
               <input type="hidden" name="course_id" value="<?php echo $id; ?>">
               <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selExmne['exmne_status']; ?>" >
            </div>
         <div class="form-group" align="right">
            <button type="submit" class="btn btn-sm btn-primary" id="success">Actualizar</button>
         </div>
         </form>
         </div>
         </fieldset>
      <script>
            document.getElementById("success").addEventListener("click", function() {
                  Swal.fire({
                     title: "¿Estás seguro?",
                     text: "¿Quieres guardar cambios?",
                     icon: "warning",
                     showCancelButton: true,
                     confirmButtonText: "Sí",
                     cancelButtonText: "Cancelar"
                  }).then((result) => {
                     if (result.isConfirmed) {
                        window.location.href =  "pages/home.php";
                     }
                  });
            });
         </script>
    







