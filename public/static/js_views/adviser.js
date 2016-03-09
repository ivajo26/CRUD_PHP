$( "#adviser-form" ).submit(function(event) {
  document.getElementById("alerts_adviser").innerHTML="";
  var errors=0;
  // First name valid
  var field = document.getElementById("first_name_adviser");
  field.parentElement.classList.remove("has-error");
  if((!(/^[A-Za-z\s]+$/.test(field.value))) || field.value.length<=0 ){
    document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> El campo nombre se encuentra vacio o contiene caracteres invalidos</span></a></div>';
    field.parentElement.classList.add("has-error");
    errors+=1;
  }

  // Last name valid
  var field = document.getElementById("last_name_adviser");
  field.parentElement.classList.remove("has-error");
  if((!(/^[A-Za-z\s]+$/.test(field.value))) || field.value.length<=0 ){
    document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> El campo apellido se encuentra vacio o contiene caracteres invalidos</span></a></div>';
    field.parentElement.classList.add("has-error");
    errors+=1;
  }

  if(errors==0){
    $.ajax({
      type: "POST",
      url: "../../controllers/adviser/add.php",
      data: $("#adviser-form").serialize(), // Adjuntar los campos del formulario enviado.
      success: function(json){
        data = JSON.parse(json);
        $table.bootstrapTable('refresh');
        $('#update_modal').modal('hide');
        if(data['status']=="True"){
          document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-success" role="alert"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> El autor se ha añadido correctamete</span></a></div>';
          document.getElementById("adviser-form").reset();
        }else if (data['status']=="True") {
          document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-warning" role="alert"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg> Se han añadido mal los campos</span></a></div>';
        }else if (data['status']=="Faile") {
            document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Error en el servidor, estamos trabajando para corregirlo</span></a></div>';
        }
      }
    });
  }
  event.preventDefault();
});

var $table = $('#table'),
    $delete = $('#delete'),
    $update = $('#update');
    $(function () {
      $update.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id;
        });
        if(ids > 0) {
          $('#update_modal').modal('show');
        }
      });
      $delete.click(function () {
          var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
              return row.id;
          });
          $('#delete_modal').modal('show');
          $('#delete_confirm').click(function(){
            var jsonString = JSON.stringify(ids);
             $.ajax({
                  type: "POST",
                  url: "../../controllers/adviser/delete.php",
                  data: {data : jsonString},
                  success: function(data){
                      // console.log(data);
                  }
              });
            $('#delete_modal').modal('hide');
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            });
          });
      });
  });
