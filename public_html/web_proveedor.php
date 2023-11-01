<?php
    //sleep(5);
    $user = $_GET['user1'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Proveedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" required>
 
        icremento =0;
        function crear(obj) {
            icremento++;
            
            field = document.getElementById('field');
            contenedor = document.createElement('div');
            contenedor.id = 'div'+icremento;
            field.appendChild(contenedor);
            
            boton = document.createElement('input');
            boton.type = 'text';
            boton.name = 'text'+'[ ]';
            contenedor.appendChild(boton);
        
        }

    </script>
</head>

<body>
    <div class="container" style="background-color: rgb(12, 13, 97);">
          
            <nav class="navbar navbar-expand navbar-light bg-light">
                <div class="col-4">
                <nav class="navbar">
                        <button class="button" onclick="<?php echo "location = 'web_proveedor.php?user1=$user'"; ?>" style="color:black;width:100px;box-shadow: 3px 3px rgb(12, 13, 97);cursor:pointer;"><b>Recargar</b> </button>                                        
                    </nav>
                </div>

                <div class="col-3">
                    <nav class="navbar">                       
                        <button id="btn_logout" onclick="<?php echo "location = 'cerrando.php?user1=$user'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><b> Cerrar sesión</b> 
                        </button>                       
                    </nav>
                </div>

                <div class="col-3">
                    <nav class="navbar">                     
                        <button id="btn_terms" onclick="<?php echo "location = 'terms_condiciones.php?user1=$user'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><b> Términos y condiciones</b>    
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
                            <label>
                                <b>Panel de control: </b>Proveedor
                                <!--<a align="right" style="position:right;cursor:pointer;" ><img src="img/ayuda.ico" alt="" title="El proveedor es quién provee los productos y ofrece sus propuestas a nuestra empresa." width="35px"></a>-->  
                                <abbr align="right" title="El proveedor es quién provee los productos y ofrece sus propuestas a nuestra empresa."><img src="img/ayuda.ico" alt="" width="25px"></abbr>
                            </label> 
                            <hr width="80%" color="yellow" style="border:solid 1px yellow;">
                            <a href="<?php echo "chat.php?user1=$user"; ?>"><img src="img/soporte2.jpg" alt="" width="50px" height="40px"> Chat y soporte</a>         
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <button id="btn_1" onClick="muestra_oculto('contenido_1','contenido_2','contenido_3')" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><img src="img/datos_basicos.png" alt="" width="35px"><br><b>1. Datos básicos</b>    
                                </button>
                            </div>
                            <div class="col">
                                <button id="btn_2" onClick="muestra_oculto('contenido_2','contenido_1','contenido_3')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><img src="img/experiencia.png" alt="" width="35px"><br><b>2. Experiencia</b>    
                                </button>
                            </div>
                            <div class="col">
                                <button id="btn_3" onClick="muestra_oculto('contenido_3','contenido_1','contenido_2')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><img src="img/documentos.png" alt="" width="35px"><br><b>3. Documentos</b>    
                                </button>
                            </div>

                        </div>
                        <br>
                            <!--SIGUE EL PHP DEL PROVEEDOR-->
                            <?php 
                                $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                $sqll = "SELECT * from persona_aux where nombres like '$user'";
                                $resultt = mysqli_query($bd_aux, $sqll);            
                                $mostrar=mysqli_fetch_array($resultt);  
                                $correo = "".$mostrar['nombres'];

                                $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
                                $consul_notif= "select cont_mensajes from persona where nombres like '$correo'";
                                $result_not = mysqli_query($bd, $consul_notif);
                                $mostrar_not=mysqli_fetch_array($result_not);                             
                                
                                $con_men = "select mensajes from persona where nombres like '$correo'";
                                $result_men = mysqli_query($bd,$con_men);
                                $mostrar_men = mysqli_fetch_array($result_men);
                                $mostrar_men_2 = "".$mostrar_men['mensajes'];
   
                                mysqli_close($bd);
                                
                                $bd_prop = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas"); 
                                $sql_prop = "SELECT empresa, telefono, direccion from propuestas where correo like '$correo'";
                                $resultt_prop = mysqli_query($bd_prop, $sql_prop);   
                                
                                $sql_cont = "select count('correo') from propuestas where correo like '$correo'";
                                $resultt_cont = mysqli_query($bd_prop, $sql_cont);  
                                $resultt_cont_0 = mysqli_fetch_assoc($resultt_cont);
                                
                                $sql_cont_prop = "select count('correo') from propuestas where correo like '$correo'";
                                $resultt_cont_prop1 = mysqli_query($bd_prop, $sql_cont_prop);  
                                $resultt_cont_prop = mysqli_fetch_assoc($resultt_cont_prop1);

                                $sqll1 = "SELECT correo, producto, cantidad, precio, comprador from inventario where correo like '$correo'";
                                $resultt1_6 = mysqli_query($bd_prop, $sqll1);            

                                $sql_cont_prop = "select count('correo') from inventario where correo like '$correo'";
                                $resultt_cont_prop1_6 = mysqli_query($bd_prop, $sql_cont_prop);  
                                $resultt_cont_prop_6 = mysqli_fetch_assoc($resultt_cont_prop1_6);
                                
                                
                                //mysqli_close($bd_aux);
                                mysqli_close($bd_prop);                    
                            ?>

                            <!--DE AQUI SIGUEN LOS CONTENIDOS OCULTOS-->
                        <div class="row">
                            <div id="contenido_1" class='col-12' role='alert' style="display:none;text-align:center;">
                                
                                <?php 
                                    echo "Sus datos son: <br/>";
                                    echo "Correo: ".$mostrar['nombres']."<br/>"; 
                                    echo "Clave: ".$mostrar['claves']."<br/>"; 
 
                                    if($resultt_cont_0["count('correo')"]>=1){
                                ?>
                                    <br>
                                    
                                    <table class="table table-success" style="text-align:center;">

                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Empresa</th>
                                                <th>Teléfono</th>
                                                <th>Dirección</th>
                                            </tr>
                                        </thead>
                                        <?php while ($mostrar_prop = mysqli_fetch_array($resultt_prop)){?>
                                            <tr >
                                                <td><?php echo $mostrar_prop['empresa'] ?></td>
                                                <td><?php echo $mostrar_prop['telefono'] ?></td>
                                                <td><?php echo $mostrar_prop['direccion'] ?></td>    
                                            </tr>    
                                        <?php } ?>
                                    </table>
                                    <?php
                                        }
                                    ?>
                                <br>
                                         
                            </div>

                            <div id="contenido_2" class='col-12' role='alert' style="display:none;">
                                
                                
                                <label for="formGroupExampleInput" class="form-label">Empresas para las cuáles ha sido proveedor:</label>

                                <form name="form1" method="POST" action="ag_experiencia.php">
                                    
                                    <fieldset type="text" class="form-control" id="field" placeholder="Primero" style="border: 3px solid lightgray; border-radius: 5px;" required>
                                        <br>
                                        <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $correo; ?>">
                                        <button style="background-color:yellow;box-shadow: 4px 4px rgb(12, 13, 97);width:90%;" type="button" value="Agregar" onclick="crear(this)" required>Agregar</button><br><br> 
                                        <button style="background-color:yellow;box-shadow: 4px 4px rgb(12, 13, 97);width:90%;" name="save" type="submit" value="Guardar" >Guardar</button><br><br>
                                    </fieldset>
                                      
                                </form>
                                
                                <br>

                                <?php
                                    $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                    $sqll1 = "SELECT experiencia from persona where nombres like '$correo'";
                                    $resultt1 = mysqli_query($bd, $sqll1);            
                                    $mostrar1 = mysqli_fetch_array($resultt1);  
                                    $correo1 = "".$mostrar1['experiencia'];
                                    
                                    $i=0;
                                    $lug_experiencia_2="";
                                    $r=0;
                                    
                                    if(strlen($correo1)==0){
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay aún experiencia registrada."."</div>";
                                    }
                                    else{
                                        while($i < strlen($correo1)){

                                            if($correo1[$i]!="" || $correo1[$i]!=NULL){
    
                                                
                                                if($correo1[$i]!="|"){
                                                    $lug_experiencia_2 .= "".$correo1[$i];
                                                    
                                                }
                                                else{
                                                    echo "<div class='alert alert-success' role='alert'>".$lug_experiencia_2."</div>";
                                                    $lug_experiencia_2="";
                                                }
                                                if($i==(strlen($correo1)-1))
                                                {
                                                    echo "<div class='alert alert-success' role='alert'>".$lug_experiencia_2."</div><br>";
                                                    $lug_experiencia_2="";
                                                    
                                                }
                                            
                                            }
                                            $i++;
                                            
                                        }
                                    }

                                ?>
                                          
                            </div>

                            <div id="contenido_3" class='col-12' role='alert' style="display:none;">

                                <?php
                                    $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                    $sqll11 = "SELECT imagen from persona where nombres like '$correo'";
                                    $resultt11 = mysqli_query($bd, $sqll11);            
                                    $mostrar11 = mysqli_fetch_assoc($resultt11);  
                                    $correo11 = $mostrar11['imagen'];

                                    echo "<script>";
                                    echo "console.log('si un','$correo')";
                                    echo "</script>";
                                    
                                    $i=0;
                                    $lug_experiencia_2="";
                                    $r=0;
                                    
                                    if(!$correo11){
                                    
                                        ?>
                                        <label for="formGroupExampleInput" class="form-label">Documentos gerente o proponente:</label>
                                        <form name="form3" method="POST" action="ag_imagen.php" enctype="multipart/form-data">
                                            <select name="ident" class="form-select" required>
                                                <option selected>Seleccionar tipo de documento de identificación</option>
                                                <option value="CC">Cédula de ciudadanía</option>
                                                <option value="CE">Cédula de extranjería</option>
                                                <option value="PO">Pasaporte</option>
                                                <option value="NIT">N.I.T</option> 
                                            </select>
                                            <br><br>
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Archivo o Foto del documento</label>
                                                <input class="form-control form-control-sm" id="imagen" type="file" name="imagen" required>
                                            </div>
                                            <label for="basic-url" class="form-label">URL del sitio proveedor: (Opcional)</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                                                <input name="link" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                            </div>
                                            <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $correo; ?>">
                                            <br>
                                            <button style="background-color:yellow;box-shadow: 4px 4px rgb(12, 13, 97);width:80%;color:black;" type="submit" class="btn btn-primary"><b>Guardar</b></button>
                                            
                                        </form>
                                        <?php

                                    }
                                    else{
                        
                                        echo "<div class='alert alert-success' role='alert'>"."Ya fueron agregados"."</div>";
                                        
                                    }   
                                    mysqli_close($bd);
                                    
                                ?>
                                
                                <br>
                                       
                            </div>
                        </div>
                            
                        <div class="row" style="box-shadow: 4px 4px rgb(12, 13, 97);width:90%;"> 
                            <button class="button" type="submit" style='cursor: pointer;' OnClick="muestra_oculta('cont_noti')"><img src="img/notificacion.png" alt="" width="28px"><b><?php echo " ".$mostrar_not['cont_mensajes'] ?> Notificaciones</b></button>
                        </div>
                        <div id="cont_noti" style="display:none;width:85%;padding:10px;">
                            <div class='alert alert-success' role='alert' style="background-color:rgb(12, 13, 97);color:black;">
                                <?php
                                    $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                    $sqll1 = "SELECT mensajes from persona where nombres like '$correo'";
                                    $resultt1 = mysqli_query($bd, $sqll1);            
                                    $mostrar1 = mysqli_fetch_array($resultt1);  
                                    $correo1 = "".$mostrar1['mensajes'];
                                    mysqli_close($bd);

                                    $i=0;
                                    $lug_experiencia_2="";
                                    $div_lug = "";
                                    $r=0;
                                    
                                    if(strlen($correo1)==0){
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay aún notificaciones registradas."."</div>";
                                    }
                                    else{
                                        while($i < strlen($correo1)){

                                            if($correo1[$i]!="" || $correo1[$i]!=NULL){
    
                                                if($correo1[$i]!="*" && $correo1[$i]!="|"){
                                                    $lug_experiencia_2 .= "".$correo1[$i];
                                                    
                                                }elseif($correo1[$i]=="*"){
                                                    $lug_experiencia_2 .= " - ";
                                                }
                                                elseif($correo1[$i]!="|"){
                                                    $lug_experiencia_2 .= "".$correo1[$i];
                                                    
                                                }
                                                elseif($correo1[$i]=="|"){
                                                    echo "<div class='alert alert-success' role='alert'>".$lug_experiencia_2."</div>";
                                                    $lug_experiencia_2="";
                                                   
                                                }
                                                if($i==(strlen($correo1)-1))
                                                {
                                                    echo "<div class='alert alert-success' role='alert'>".$lug_experiencia_2."</div>";
                                                    $lug_experiencia_2="";
                                                    
                                                }
                                            
                                            }
                                            $i++;
                                            
                                        }
                                    }
                                    
                                ?>
                            </div>
                        </div>
                        <br>            
                        <div class="row" style="box-shadow: 4px 4px rgb(12, 13, 97);width:90%;">
                            <button class="button" type="submit" style='cursor: pointer;' OnClick="muestra_oculta('cont_prop')"><img src="img/propuestas.png" alt="" width="30px"><?php echo "<b> " .$resultt_cont_prop["count('correo')"]."</b>"; 
                            if($resultt_cont_prop["count('correo')"]!=1){
                                echo "<b> Propuestas</b>";
                            }
                            else{
                                echo "<b> Propuesta</b>";
                            }?></button>
                        </div>
                        <div id="cont_prop" style="display:none;width:90%;padding:10px;background-color:rgb(12, 13, 97);">
                            
                            <?php
                                $bd_propu = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas"); 
                                $sql_prop_2 = "SELECT producto, cantidad, precio from propuestas where correo like '$correo'";
                                $resultt_prop_2 = mysqli_query($bd_propu, $sql_prop_2);

                                $sql_cont_prop = "select count('correo') from propuestas where correo like '$correo'";
                                $resultt_cont_prop1 = mysqli_query($bd_propu, $sql_cont_prop);  
                                $resultt_cont_prop = mysqli_fetch_assoc($resultt_cont_prop1);

                                if($resultt_cont_prop["count('correo')"]>=1){
                            ?>
                                    <table class="table table-success" style="text-align:center;">

                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Total</th>
                                            </tr>
                                        </thead> 
                                        <?php 
                                            
                                            while ($mostrar_prop = mysqli_fetch_array($resultt_prop_2)){?>
                                            <tr>
                                                <?php
                                                if($mostrar_prop['producto']==1){
                                                    $product="Sal Marina KG";
                                                }elseif($mostrar_prop['producto']==2){
                                                    $product="Azúcar KG";
                                                }elseif($mostrar_prop['producto']==3){
                                                    $product="Crema LT";
                                                }elseif($mostrar_prop['producto']==4){
                                                    $product="Cloruro Cálcico LT";
                                                }elseif($mostrar_prop['producto']==5){
                                                    $product="Cloruro Sódico KG";
                                                }elseif($mostrar_prop['producto']==6){
                                                    $product="Coagulante KG";
                                                }elseif($mostrar_prop['producto']==7){
                                                    $product="Vinagre LT";
                                                }elseif($mostrar_prop['producto']==8){
                                                    $product="Canela KG";
                                                }elseif($mostrar_prop['producto']==9){
                                                    $product="Esencias de sabores LT";
                                                }elseif($mostrar_prop['producto']==10){
                                                    $product="Endulzantes artificiales KG";
                                                }elseif($mostrar_prop['producto']==11){
                                                    $product="Colorante natural LT";
                                                }elseif($mostrar_prop['producto']==12){
                                                    $product="Leche entera LT";
                                                }elseif($mostrar_prop['producto']==13){
                                                    $product="Leche descremada LT";
                                                }elseif($mostrar_prop['producto']==14){
                                                    $product="Leche en polvo KG";
                                                }elseif($mostrar_prop['producto']==15){
                                                    $product="Tripolifosfato de Sodio. Estabilizante KG";
                                                }elseif($mostrar_prop['producto']==16){
                                                    $product="Aceite de palma LT";
                                                }elseif($mostrar_prop['producto']==17){
                                                    $product="Aceite de soya LT"; 
                                                }elseif($mostrar_prop['producto']==18){
                                                    $product="Ácido sórbico KG Conservante"; 
                                                }elseif($mostrar_prop['producto']==19){
                                                    $product="Ácido cítrico KG Cinergista"; 
                                                }
                                                ?>
                                                <td><?php echo $product ?></td>
                                                <td><?php echo $mostrar_prop['cantidad'] ?></td>
                                                <td><?php echo $mostrar_prop['precio'] ?></td>    
                                            </tr>    
                                        <?php } 
                                        mysqli_close($bd_propu);
                                        ?>
                                    </table>
                                    <?php }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No tienes propuestas actualmente."."</div>";
                                    }  ?>
                            
                        </div>
                        <br>
                        <div class="row" style="box-shadow: 4px 4px rgb(12, 13, 97);width:90%;">
                            <button class="button" type="submit" style='cursor: pointer;' OnClick="muestra_oculta('cont_ventas')"><img src="img/procesos.png" alt="" width="30px"><b><?php echo " ".$resultt_cont_prop_6["count('correo')"] ?>    Procesos vigentes / Ventas</b></button>
                        </div>
                        
                        <div id="cont_ventas" style="display:none;width:95%;padding:10px;">
                            <div class='alert alert-success' role='alert' style="background-color:rgb(12, 13, 97);color:black;">

                                <?php 

                                    if($resultt_cont_prop_6["count('correo')"]>=1){
                                        ?>
                                        <table name="tabal" id="tabal" class="table table-success" style="text-align:center;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Comprador</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead> 
                                        <?php

                                            while ($mostrar_prop = mysqli_fetch_array($resultt1_6)){?>
                                                                                    
                                                <tr >
                                                    <td><?php echo $mostrar_prop['comprador'] ?></td> 
                                                    <td><?php echo $mostrar_prop['producto'] ?></td>
                                                    <td><?php echo $mostrar_prop['cantidad'] ?></td> 
                                                    <td><?php echo $mostrar_prop['precio'] ?></td>  
                                                    
                                                </tr>    
                                            <?php } 
                                            //mysqli_close($bd_propu);
                                            ?>
                                            </table>

                                            <?php
                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay compras registradas."."</div>";
                                    }
                                ?>

                            </div>
                            
                        </div> 
                        <br>            
                    </div>

                    <br>

                </div>
                <br>

        </div>
    
        <br>
        <br><br><br>     
    </div>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>