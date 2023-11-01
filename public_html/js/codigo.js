$(document).ready(function(){

  $("#frmFormulas").submit(function(evt){
    evt.preventDefault();
    $.ajax({
        url: "listar_formulas2.php",
        type: "post",
        data: {"lstusu": $("#lstusu").val()},
        beforeSend: function(){
            $("#divres").html("<img src='images/1488.gif' alt='Espere...'>");
        },
        success: function(datos){
           $("#divres").html(datos);
        },
        error: function(controlador, mensaje){
            $("#divres").html("Error<br>Petición no procesada<br>" + mensaje);
        }
    });
  });


  $("#frmAddFormula").submit(function(evt){
    evt.preventDefault();
    $("#modal1").modal("show");
    $.ajax({
        url: "add_formula2.php",
        type: "post",
        data: $("#frmAddFormula").serialize(), //{llave1: valor1, llave2:valor2}
        beforeSend: function(){
            $("#divres").html("<img src='images/1488.gif' alt='Espere...'>");
        },
        success: function(datos){
           $("#divres").html(datos);
           $("#txtmed").val("");
           $("#txtdos").val("");
           $("#txtfec").val("");
           $("#txthor").val("");
        },
        error: function(controlador, mensaje){
            $("#divres").html("Error<br>Petición no procesada<br>" + mensaje);
        }
    });
  });

});


function ver(ced){
  
  $.ajax({
    url: "listar_formulas3.php",
    type: "post",
    data: {"lstusu": ced},
    dataType: 'json',
    beforeSend: function(){
        $("#divres").html("<img src='images/1488.gif' alt='Espere...'>");
    },
    success: function(datos){
       //$("#divres").html(datos);
      var i=0;
      var n= datos.length;

      $("#divres").html("<h3>Los medicamentos son:</h3>")
      for (i=0;i<n;i++){
        $("#divres").append("<br>" + datos[i].medicamento + " (Dosis: " + datos[i].dosis + ")");
      }

    },
    error: function(controlador, mensaje){
        $("#divres").html("Error<br>Petición no procesada<br>" + mensaje);
    }
});
}