<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nivel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Nivel</label>
            <input type="" name="course_name" id="course_name" class="form-control" placeholder=" " required="" autocomplete="off">
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


<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Course</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Now</button>
        </div>
      </div>
     </form>
    </div>
  </div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar quiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Selecccionar nivel</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Selecccionar nivel</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No encontrado</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>Límite de tiempo</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Seleccionar tiempo</option>
              <option value="10">10 Minutos</option> 
              <option value="20">20 Minutos</option> 
              <option value="30">30 Minutos</option> 
              <option value="40">40 Minutos</option> 
              <option value="50">50 Minutos</option> 
              <option value="60">60 Minutos</option> 
            </select>
          </div>

          <div class="form-group">
            <label>Límite de preguntas para mostrar</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Límite de preguntas para mostrar">
          </div>

          <div class="form-group">
            <label>Nombre de la materia</label>
            <input type="" name="examTitle" class="form-control" placeholder="Nombre" required="">
          </div>

          <div class="form-group">
            <label>Descripción</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Descripcion del examen"></textarea>
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


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Nombre completo</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Fátima López Pérez" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Fecha de nacimiento</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Fecha" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">Selecciona tu género</option>
              <option value="hombre">Hombre</option>
              <option value="mujer">Mujer</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nivel</label>
            <select class="form-control" name="course" id="course">
              <option value="0">Selecciona nivel</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <!-- <div class="form-group">
            <label>Año</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Selecciona</option>
              <option value="first year">First Year</option>
              <option value="second year">Second Year</option>
              <option value="third year">Third Year</option>
              <option value="fourth year">Fourth Year</option>
            </select>
          </div> -->
          <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="*******" autocomplete="off" required="">
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



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar preguntas<br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Pregunta</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Ej: ¿Cuál es el resutado de 2+2?" autocomplete="off">
          </div>

          <fieldset>
            <legend>Introduzca las respuestas para la opciones</legend>
            <div class="form-group">
                <label>Opción A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Opción A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Opción B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Opción B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Opción C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Opción C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Opción D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Opción D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Respuesta correcta</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Ej: A" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>