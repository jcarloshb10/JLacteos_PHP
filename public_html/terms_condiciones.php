<?php
    //sleep(5);
    $user = $_GET['user1'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Políticas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="background-color: rgb(12, 13, 97);">
        
            <nav class="navbar navbar-expand navbar-light bg-light">
                <div class="col-4">
                    <nav class="navbar">
                        <button class="button" onclick="<?php echo "location = 'terms_condiciones.php?user1=$user'"; ?>" style="color:black;width:100px;box-shadow: 3px 3px rgb(12, 13, 97);cursor:pointer;"><b>Recargar</b> </button>                                        
                    </nav>
                </div>

                <div class="col-3">
                    <nav class="navbar">
                        
                        <button id="btn_logout" onclick="<?php echo "location = 'cerrando.php?user1=$user'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><b> Cerrar sesión</b>    
                        </button>
                             
                    </nav>
                </div>
     
            </nav>
   
        <div class="row">

                <div align="center" class="col-4" style="padding-top:20px;">
                    <img alt="Image html" width="80%" src="img/colacteos.jpeg"/>
                </div>
                
                <div class="col-7 order-last" align="center" style="padding-top:20px;">
            
                    <div class="container" style="background-color: rgb(248, 243, 241);">

                        <div class="row" style="padding:10px;">

                            <div id="ventana3" class='alert alert-success' role='alert'>
                                <div>
                                    <div >
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color:blue;">Autorización para el tratamiento de datos personales. </h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="modal-text" style="color:black;">J-LÁCTEOS DE NARIÑO S.A.S Identificada con NIT xxxx-x será elresponsable  del tratamiento y, en tal virtud, podrá recolectar, almacenar, usar 
                                            (desarrollo del objeto social de la empresa) paralas finalidades descritas en la política de tratamiento de datos publicada por la S.A.S en www.jlacteos.com.
                                            Manifiesto que me informaron que, en caso de recolección de mi información sensible, tengo derecho a contestar o no las preguntas que me formulen y a entregar o no los datos solicitados.
                                        Entiendo que son datos sensibles aquellos que afectan la intimidad del Titular ocuyo uso indebido puede generar discriminación tales como rientación política, convicciones religiosas o filosóficas, datos relativos a la salud, a la vida sexual y los datos biométricos determinados en la ley 
                                    de protección de datos. Manifiesto que me informaron que los datos sensibles que se recolectarán serán utilizados para las finalidades antes descritas.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onClick="history.back()" class="btn btn-default" data-dismiss="modal"  style="box-shadow: 4px 4px rgb(12, 13, 97); color:black;font-family:Roboto;"><b>Regresar</b></button>
                                        </div>       
                                    </div>
                                </div>
                            </div>
                         </div>
                    
                    </div>

                </div>

        </div>
 
        <br><br><br>
           
    </div>
     
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>