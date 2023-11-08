<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<!-- Modal For Add Course -->
<div class="modal fade" id="feedbacksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addFeebacks" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comentarios+</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Comentarios y sugerencias</label><br>
            <?php 
               $selMe = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
             ?>
            <input type="radio" name="asMe" value="<?php echo $selMe['exmne_fullname']; ?>"> <?php echo $selMe['exmne_fullname']; ?> <br>
            <input type="radio" name="asMe" value="Anonymous"> Anónimo
            
          </div>
          <div class="form-group">
           <textarea name="myFeedbacks" class="form-control" rows="3" placeholder="Escribe aquí.."></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
    </div>
   </form>
  </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addchange" method="post">

     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-12 mt-4">
     <div class="form-group">
     <?php 
               $selMe = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
             ?>
        <legend>Nombre completo</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required=""  value="<?php echo $selMe['exmne_fullname']; ?>" >
                                                                                 
     </div>

     <div class="form-group">
        <legend>Género</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selMe['exmne_gender']; ?></option>
          <option value="male">Hombre</option>
          <option value="female">Mujer</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Cumpleaños</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selMe["exmne_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Nivel</legend>
        <?php 
            $exmneCourse = $selMe['exmne_course'];
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

     <!-- <div class="form-group">
        <legend>Year level</legend>
        <input type="" name="exYrlvl" class="form-control" required="" value="<?php echo $selMe['exmne_year_level']; ?>" >
     </div> -->

     <div class="form-group">
        <legend>Correo</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selMe['exmne_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Contraseña</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selMe['exmne_password']; ?>" >
     </div>
     <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la contraseña del formulario
    $password = $_POST["exPass"];
    
    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Guardar $hashedPassword en la base de datos
    // ...
}
?>


     <div class="form-group">
        <legend>Status</legend>
        <input type="hidden" name="course_id" value="<?php echo $id; ?>">
        <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selMe['exmne_status']; ?>" >
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary" id="success">Actualizar</button>
  </div>
  </div>
      </div>
    </div>
   </form>
  </div>
</div>

<script>
// Update Examinee
$(document).on("submit","#addchange" , function(){
  $.post("query/updateuserExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            data.exFullname + ' <br>has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});

function refreshDiv()
{
  // $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}
  </script>








