$.ajax({
  type: "POST",
  url: "../../controllers/adviser/list.php",
  success: function(json){
    data = JSON.parse(json);
    for (var i = 0; i < data.length; i++) {
      document.getElementById("adviser_project").innerHTML+='<option value="'+data[i].id+'">'+data[i].first_name+' '+data[i].last_name+'</option>';
    }
  }
});

$.ajax({
  type: "POST",
  url: "../../controllers/author/list.php",
  success: function(json){
    data = JSON.parse(json);
    for (var i = 0; i < data.length; i++) {
      document.getElementsByName("author[]")[0].innerHTML+='<option value="'+data[i].id+'">'+data[i].first_name+' '+data[i].last_name+'</option>';
      document.getElementsByName("author[]")[1].innerHTML+='<option value="'+data[i].id+'">'+data[i].first_name+' '+data[i].last_name+'</option>';
      document.getElementsByName("author[]")[2].innerHTML+='<option value="'+data[i].id+'">'+data[i].first_name+' '+data[i].last_name+'</option>';
    }
  }
});

$( "#project-form" ).submit(function(event) {
  document.getElementById("alerts_project").innerHTML="";
  var errors=0;
  // Name valid
  var field = document.getElementById("name_project");
  field.parentElement.classList.remove("has-error");
  if((!(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(field.value))) || field.value.length<=0 ){
    document.getElementById("alerts_project").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> El campo nombre se encuentra vacio o contiene caracteres invalidos</span></a></div>';
    field.parentElement.classList.add("has-error");
    errors+=1;
  }

  // Last name valid
  var field = document.getElementById("note_project");
  field.parentElement.classList.remove("has-error");
  if(!(0<field.value && field.value<5) || field.value.length<=0){
    document.getElementById("alerts_project").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> El campo nota se encuentra vacio o no esta en el rangoo de 0 a 5</span></a></div>';
    field.parentElement.classList.add("has-error");
    errors+=1;
  }

  // Line  valid
  var field = document.getElementById("line_project");
  field.parentElement.classList.remove("has-error");
  if((!(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(field.value))) || field.value.length<=0 ){
    document.getElementById("alerts_project").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> El campo linea de investigacion se encuentra vacio o contiene caracteres invalidos</span></a></div>';
    field.parentElement.classList.add("has-error");
    errors+=1;
  }

  var field = document.getElementById("adviser_project");
  field.parentElement.classList.remove("has-error");
  if(field.value.length<=0){
    document.getElementById("alerts_project").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Debe seleccionar un asesor</span></a></div>';
    field.parentElement.classList.add("has-error");
    errors+=1;
  }

  var field = document.getElementsByName("author[]");
  var isnull = true;
  var isrepeat = false;
  for(var i = 0; i < field.length; i++){
    field[i].parentElement.classList.remove("has-error");
    if(field[i].value.length>0){
      isnull=false;
    }
  }
  for(var i = 0; i < field.length-1; i++){
    for (var j = i+1; j < field.length; j++) {
      if (field[i].value.length>0) {
        if(field[i].value==field[j].value){
          isrepeat=true;
        }
      }
    }
  }
  if(isnull){
    document.getElementById("alerts_project").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Debe seleccionar al menos un autor</span></a></div>';
    for(var i = 0; i < field.length; i++){
      field[i].parentElement.classList.add("has-error");
    }
    errors+=1;
  }else if (isrepeat) {
    document.getElementById("alerts_project").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Se han seleccionado 2 o mas autores iguales</span></a></div>';
    for(var i = 0; i < field.length; i++){
      field[i].parentElement.classList.add("has-error");
    }
    errors+=1;
  }
  // console.log($("#project-form").serialize());
  if(errors==0){
    $.ajax({
      type: "POST",
      url: "../../controllers/project/add.php",
      data: $("#project-form").serialize(), // Adjuntar los campos del formulario enviado.
      success: function(json){
        data = JSON.parse(json);
        console.log(data);
        // $table.bootstrapTable('refresh');
        // $('#update_modal').modal('hide');
        // if(data['status']=="True"){
        //   document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-success" role="alert"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> El autor se ha añadido correctamete</span></a></div>';
        //   document.getElementById("adviser-form").reset();
        // }else if (data['status']=="True") {
        //   document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-warning" role="alert"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg> Se han añadido mal los campos</span></a></div>';
        // }else if (data['status']=="Faile") {
        //     document.getElementById("alerts_adviser").innerHTML+='<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Error en el servidor, estamos trabajando para corregirlo</span></a></div>';
        // }
      }
    });
  }
  event.preventDefault();
});
