<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Registrar propuesta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="background-color: rgb(12, 13, 97);">
        <div class="row">

            <div class="col-6" style="padding-top:30px; padding-bottom: 10px;">
                <img alt="Image html" width="100%"  src="img/colacteos.jpeg" />
                <br><br>
                <button  role="button" class="button" data-toggle="modal" onClick="muestra_oculta('ventana')" style="box-shadow: 4px 4px rgb(12, 13, 97);cursor:pointer;background-color:white;color:black;"><b>Abrir políticas y condiciones.</b></button>

                <div id="ventana" class='alert alert-success' role='alert' style="display:block;">
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
                                <button type="button" onClick="muestra_oculte('ventana')" class="btn btn-default" data-dismiss="modal"  style="box-shadow: 4px 4px rgb(12, 13, 97); color:black;font-family:Roboto;"><b>Cerrar</b></button>
                            </div>       
                        </div>
                    </div>
                </div>
            
            </div>
            <br>
            <div class="col-6 justify-content-center" style="padding-top:30px; padding-bottom: 10px;">
                <div class="container" style="background-color: rgb(59, 77, 138);">

                    <div class="col justify-content-center">
                        
                            <form action="login.php" class="form" method="post" enctype="multipart/form-data">
                                
                                <div class="row justify-content-center" style="padding-top:10px;">
                                    <label style="padding-top:10px; color: aliceblue;"><b>Regístra tu propuesta!</b></label>
                                </div>
                                <div class="row justify-content-center" style="padding-top:10px;">
                                    <label style="padding-bottom:5px; color: aliceblue; font: size 12px;;">Es rápido y fácil.</label>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <input style="border-color: yellow; border-style: solid;border-radius: 10px; height: 43px;" 
                                        type="text" name="txtEmpresa" id="txtEmpresa"
                                        placeholder="  Razón social o Empresa" required>

                                    </div>
                                    <br>
                                    <div class="col-6">
                                        
                                        <input style="border-color: yellow; border-style: solid; border-radius: 10px; height:43px;" type="email" 
                                        name="txtEmail" id="txtEmail" placeholder="  E-mail" required>

                                    </div>
                                </div>
                                <br>
                                <div class="row justify-content-center"
                                    style="border-radius: 10px; widht:50%;">
                                    <div class="col-6">
                                        <input style="border-color: yellow; border-style: solid;border-radius: 10px; height: 43px;" type="tel" name="txtTel" id="txtTel"
                                        placeholder="  Teléfono / Celular" required>

                                    </div>
                                    <br>
                                    <div class="col-6">
                                        
                                        <input style="border-color: yellow; border-style: solid; border-radius: 10px; height:43px;" type="text" 
                                        name="txtDireccion" id="txtDireccion" placeholder="  Dirección" required>

                                    </div>

                                </div>
                                
                                <br>
                                <div class="form-group">
                                    <label style="color:white;">Propuesta</label>

                                    <select id="opc_producto" name="opc_producto" class="form-select" text="Producto" required>
                                        <option>ELEGIR MATERIA PRIMA</option>
                                        <option value="1">Sal Marina KG</option>
                                        <option value="2">Azúcar KG</option>
                                        <option value="3">Crema LT</option>
                                        <option value="4">Cloruro Cálcico LT</option>
                                        <option value="5">Cloruro Sódico KG</option>
                                        <option value="6">Coagulante KG</option>
                                        <option value="7">Vinagre LT</option>
                                        <option value="8">Canela KG</option>
                                        <option value="9">Esencias de sabores LT</option>
                                        <option value="10">Endulzantes artificiales KG</option>
                                        <option value="11">Colorante natural LT</option>
                                        <option value="12">Leche entera LT</option>
                                        <option value="13">Leche descremada LT</option>
                                        <option value="14">Leche en polvo KG</option>
                                        <option value="15">Tripolifosfato de Sodio. Estabilizante KG</option>
                                        <option value="16">Aceite de palma LT</option>
                                        <option value="17">Aceite de soya LT</option>
                                        <option value="18">Ácido sórbico KG Conservante</option>
                                        <option value="19">Ácido cítrico KG Cinergista</option>
                                    </select>
                                    <br>
                                    <input style="border-color: yellow; border-style: solid; border-radius: 10px; height:43px;" type="number" 
                                        name="txtCantidad" id="txtCantidad" placeholder="  Cantidad" min="1" required>

                                        <input style="border-color: yellow; border-style: solid; border-radius: 10px; height:43px;" type="number" 
                                        name="txtPrecio" id="txtPrecio" placeholder="  Precio Total" min="1" required>
                                    
                                </div>
                                <br>
                                <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                    <button class="button" type="submit" id="envia" style='cursor: pointer;'><b>Enviar propuesta</b></button>
                                </div>
                                
                                <div style="padding-top:5px;">
                                    <label style="padding-top:5px; padding-bottom:5px; color: aliceblue;">Al hacer click en Enviar propuesta, aceptas las <a style='cursor: pointer;'>condiciones y la política de datos</a>.
                                    Es posible que le enviemos notificaciones y ofertas por e-mail.</label>
                                </div>
                            </form>
                            
                            <?php
                                $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                $sqll = "SELECT * from proveedor_aux";
                                $resultt = mysqli_query($bd_aux, $sqll);            
                                $mostrar=mysqli_fetch_array($resultt);            
                            ?>

                            <div class="titulo_boton" >Datos de acceso:
                                <a style='cursor: pointer;' onClick="muestra_oculta('contenido')" title="" class="boton_mostrar">Mostrar / Ocultar</a>
                            
                            </div>
                            <div id="contenido" class='alert alert-success' role='alert' style="display:block;">
                            
                            <?php 
                                
                                if($mostrar!=NULL){
                                    if($mostrar['nombres']=='1'){
                                        echo "<div class='alert alert-success' role='alert'><b>Ya tiene usuario y clave, ingrese!</b><br>Ingrese con el correo y contraseña dado al registrarse.<br></div>";
                                    }
                                    elseif($mostrar['nombres']=='2'){
                                        echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>Ya realizaste ésta propuesta.<br></div>";
                                    }
                                    else{
                                        echo "Sus datos de acceso son: <br/>";
                                        echo "Correo: ".$mostrar['nombres']."<br/>"; 
                                        echo "Clave: ".$mostrar['claves']."<br/>"; 

                                    ?>
   
                                    <textarea id="textArea" style="height: 25px; display:none;" ><?php 
                                        if($mostrar!=NULL){
                                            echo "".$mostrar['claves']; 
                                        }
                                    ?></textarea>
                                    <button id="btn" onclick="copyToClickBoard('copied')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><b>Copiar clave</b>    
                                    </button>
                                    
                                    <label id="copied" class="alert alert-primary" role="alert" style="display:none; height:38px;">
                                       Listo!    
                                    </label>
                                       
                                    <?php
                                    }
                                }
                                else{
                                    echo "<div class='alert alert-danger' role='alert'><br>Realice su propuesta.<br></div>";
                                }
                                
                                $con_res2 = "delete from proveedor_aux";
                                $ress3 = mysqli_query($bd_aux,$con_res2);
                               
                                mysqli_close($bd_aux); 

                            ?>
                                        
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                <button class="button" onClick="location.href='index.php'" style='cursor: pointer;'><b>Iniciar sesión</b></button>                
                            </div>
                            <br>
                        
                    </div>

                </div>
            </div>

        </div>
       
      <br>
                    
    </div>
    <br>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>