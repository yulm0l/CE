// Admin Log in
$(document).on("submit","#adminLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Incorrecto',
          'El correo electrónico o contraseña que ingresaste es incorrecto.',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href='home.php';
      }
   },'json');

   return false;
});



// Add Course 
$(document).on("submit","#addCourseFrm" , function(){
  $.post("query/addCourseExe.php", $(this).serialize() , function(data){
  	if(data.res == "exist")
  	{
  		Swal.fire(
  			'Ya existe',
  			data.course_name.toUpperCase() + ' Ya existe',
  			'error'
  		)
  	}
  	else if(data.res == "success")
  	{
  		Swal.fire(
  			'Success',
  			data.course_name.toUpperCase() + ' Agregado exitosamente',
  			'success'
  		)
          // $('#course_name').val("");
          refreshDiv();
            setTimeout(function(){ 
                $('#body').load(document.URL);
             }, 2000);
  	}
  },'json')
  return false;
});

// Update Course
$(document).on("submit","#updateCourseFrm" , function(){
  $.post("query/updateCourseExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Éxito',
            'Actualizado correctamente!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Course
$(document).on("click", "#deleteCourse", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteCourseExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Éxito',
            'Borrado correctamente!',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Exam
$(document).on("click", "#deleteExam", function(e) {
  var id = $(this).data("id");
  
  if (confirm("¿Está seguro de que desea borrar este examen?")) {
      $.ajax({
          type: "post",
          url: "query/deleteExamExe.php",
          dataType: "json",
          data: { id: id },
          cache: false,
          success: function(data) {
              if (data.res === "success") {
                  Swal.fire(
                      'Éxito',
                      'Borrado correctamente!',
                      'success'
                  );
                  refreshDiv();
              }
          },
          error: function(xhr, ErrorStatus, error) {
              console.log(status.error);
          }
      });
  }

  return false;
});
// Delete examinee
$(document).on("click", "#deleteUser", function(e) {
  var id = $(this).data("id");
  
  if (confirm("¿Está seguro de que desea borrar este examen?")) {
      $.ajax({
          type: "post",
          url: "query/deleteUserExe.php",
          dataType: "json",
          data: { id: id },
          cache: false,
          success: function(data) {
              if (data.res === "success") {
                  Swal.fire(
                      'Éxito',
                      'Borrado correctamente!',
                      'success'
                  );
                  refreshDiv();
              }
          },
          error: function(xhr, ErrorStatus, error) {
              console.log(status.error);
          }
      });
  }

  return false;
});



// Add Exam 
$(document).on("submit","#addExamFrm" , function(){
  $.post("query/addExamExe.php", $(this).serialize() , function(data){
    if(data.res == "noSelectedCourse")
   {
      Swal.fire(
          'Vacío',
          'Por favor selecciona uno',
          'error'
       )
    }
    if(data.res == "noSelectedTime")
   {
      Swal.fire(
          'Sin tiempo',
          'Selecciona el tiempo límite',
          'error'
       )
    }
    if(data.res == "noDisplayLimit")
   {
      Swal.fire(
          'Sin límite de visualización',
          'Porfavor agrega un ñímite',
          'error'
       )
    }

     else if(data.res == "exist")
    {
      Swal.fire(
        'Ya existe',
        data.examTitle.toUpperCase() + '<br>Ya existe',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        data.examTitle.toUpperCase() + '<br>Agregado exitosamente',
        'success'
      )
          $('#addExamFrm')[0].reset();
          $('#course_name').val("");
          refreshDiv();
    }
  },'json')
  return false;
});



// Update Exam 
$(document).on("submit","#updateExamFrm" , function(){
  $.post("query/updateExamExe.php", $(this).serialize() , function(data){
    if(data.res == "success")
    {
      Swal.fire(
          'Actualizado',
          data.msg + ' <br>Actualizado correctamente',
          'success'
       )
          refreshDiv();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
        "Something's went wrong!",
         'Somethings went wrong',
        'error'
      )
    }
   
  },'json')
  return false;
});

// Update Question
$(document).on("submit","#updateQuestionFrm" , function(){
  $.post("query/updateQuestionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Éxito',
            'Pregunta actualizada correctamente!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Question
$(document).on("click", "#deleteQuestion", function(e) {
  e.preventDefault();
  var id = $(this).data("id");

  if (confirm('¿Estás seguro de que deseas eliminar esta pregunta?')) {
    $.ajax({
      type: "post",
      url: "query/deleteQuestionExe.php",
      dataType: "json",
      data: { id: id },
      cache: false,
      success: function(data) {
        if (data.res == "success") {
          Swal.fire(
            'Eliminado',
            'Pregunta eliminada correctamente',
            'success'
          );
          refreshDiv();
        }
      },
      error: function(xhr, ErrorStatus, error) {
        console.log(status.error);
      }
    });
  }
  return false;
});

// Add Question 
$(document).on("submit","#addQuestionFrm" , function(){
  $.post("query/addQuestionExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
          'Ya existe',
          data.msg + ' La pregunta  <br>ya existe',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Éxito',
         data.msg + ' pregunta <br>Agregado exitosamente',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'Sin género',
          'Selecciona un género',
          'error'
       )
    }
    else if(data.res == "noCourse")
    {
      Swal.fire(
          'Vacío',
          'Selecciona uno',
          'error'
       )
    }
    // else if(data.res == "noLevel")
    // {
    //   Swal.fire(
    //       'No Year Level',
    //       'Please select year level',
    //       'error'
    //    )
    // }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Nombre existente',
          data.msg + ' ya existe',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Correo existente',
          data.msg + ' ya existe',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Éxito',
          data.msg + ' Agregado exitosamente',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Something's Went Wrong",
          '',
          'error'
       )
    }


    
  },'json')
  return false;
});


// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExaminee.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'Si género',
          'Selecciona un género',
          'error'
       )
    }
    else if(data.res == "noCourse")
    {
      Swal.fire(
          'Sin nivel',
          'Selecciona un nivel',
          'error'
       )
    }
    // else if(data.res == "noLevel")
    // {
    //   Swal.fire(
    //       'No Year Level',
    //       'Please select year level',
    //       'error'
    //    )
    // }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Nombre existente',
          data.msg + ' ya existe',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Email Already Exist',
          data.msg + ' ya existe',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Éxito',
          data.msg + ' Agregado exitosamente',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Something's Went Wrong",
          '',
          'error'
       )
    }


    
  },'json')
  return false;
});




// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExamineeExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Éxito',
            data.exFullname + ' <br>actualizado correctamente!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});

// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExaminee.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Éxito',
            data.exFullname + ' <br>actualizado correctamente!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});

function refreshDiv()
{
  $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}


