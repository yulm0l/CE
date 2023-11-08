// Admin Log in
$(document).on("submit","#examineeLoginFrm", function(){
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




// Submit Answer
$(document).on('submit', '#submitAnswerFrm', function(){
  var examAction = $('#examAction').val();

  if(examAction != "")
  {
    Swal.fire({
    title: 'Tiempo terminado',
    text: "Tu tiempo término, presiona ok",
    icon: 'warning',
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK!'
}).then((result) => {
if (result.value) {

   $.post("query/submitAnswerExe.php", $(this).serialize(), function(data){

    if(data.res == "a")
    {
       Swal.fire(
         'Already Taken',
         "you already take this exam",
         'error'
       ) 
    }
    else if(data.res == "success")
    {
        Swal.fire({
            title: 'Success',
            text: "your answer successfully submitted!",
            icon: 'success',
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
          $('#submitAnswerFrm')[0].reset();
           var exam_id = $('#exam_id').val();
           window.location.href='home.php?page=result&id=' + exam_id;
        }

        });


    }
    else if(data.res == "failed")
    {
     Swal.fire(
         'Error',
         "Something;s went wrong",
         'error'
       ) 
    }

   },'json');

}
});
  }
  else
  {
      Swal.fire({
    title: '¿Estás seguro?',
    text: "¿Quieres guardar tus respuestas?",
    icon: 'warning',
    showCancelButton: true,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, ahora!'
}).then((result) => {
if (result.value) {

   $.post("query/submitAnswerExe.php", $(this).serialize(), function(data){

    if(data.res == "a")
    {
       Swal.fire(
         'Already Taken',
         "you already take this exam",
         'error'
       ) 
    }
    else if(data.res == "success")
    {
        Swal.fire({
            title: 'Success',
            text: "your answer successfully submitted!",
            icon: 'success',
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
          $('#submitAnswerFrm')[0].reset();
           var exam_id = $('#exam_id').val();
           window.location.href='home.php?page=result&id=' + exam_id;
        }

        });


    }
    else if(data.res == "failed")
    {
     Swal.fire(
         'Error',
         "Algo sucedió",
         'error'
       ) 
    }

   },'json');

}
});
  }

return false;
});


// Submit Feedbacks
$(document).on("submit","#addFeebacks", function(){
   $.post("query/submitFeedbacksExe.php", $(this).serialize(), function(data){
      if(data.res == "limit")
      {
        Swal.fire(
          'Error',
          'Alcanzaste el máximo de respuestas',
          'error'
        )
      }
      else if(data.res == "success")
      {
        Swal.fire(
          'Éxito',
          'Tu comentario se envió correctamente',
          'success'
        )
          $('#addFeebacks')[0].reset();
        
      }
   },'json');

   return false;
});



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
// Delete examinee
$(document).on("click", "#deleteUser", function(e) {
  var id = $(this).data("id");
  
  if (confirm("¿Está seguro de que desea borrar este examen?")) {
      // Si el usuario confirma, se ejecutará la acción de borrado
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





// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExaminee.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'No Gender',
          'Please select gender',
          'error'
       )
    }
    else if(data.res == "noCourse")
    {
      Swal.fire(
          'No Course',
          'Please select course',
          'error'
       )
    }
    else if(data.res == "noLevel")
    {
      Swal.fire(
          'No Year Level',
          'Please select year level',
          'error'
       )
    }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Fullname Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Email Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Success',
          data.msg + ' are now successfully added',
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



