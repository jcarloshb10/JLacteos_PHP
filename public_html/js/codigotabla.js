$(document).ready(function(){
    $("#tablaFormulas").DataTable( {
        "language": {
            "lengthMenu": "Presenta _MENU_ registros por página",
            "zeroRecords": "No encontrado",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtro de _MAX_ registros en total)",
            "search": "Buscar",
 	    "paginate": {
        	"first":      "Primero",
	        "last":       "Último",
        	"next":       "Siguiente",
        	"previous":   "Anterior"
    		}		
        }
    } );
});
