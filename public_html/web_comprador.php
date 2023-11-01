<?php
    //sleep(5);
    $user = $_GET['user1'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Comprador</title>
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
                        <button class="button" onclick="<?php echo "location = 'web_comprador.php?user1=$user'"; ?>" style="color:black;width:100px;box-shadow: 3px 3px rgb(12, 13, 97);cursor:pointer;"><b>Recargar</b> </button>                                        
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

                <div class="col-8 order-last" align="center" style="padding-top:20px;padding-left:40px">
                    <div class="container" style="background-color: rgb(248, 243, 241);">
                        <div class="row" style="padding:10px;">       
                            <label>
                                <b>Panel de control: </b>Comprador
                                  
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
                                <button id="btn_2" onClick="muestra_oculto('contenido_2','contenido_1','contenido_3')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><img src="img/experiencia.png" alt="" width="35px"><br><b>2. Propuestas direccionadas</b>    
                                </button>
                            </div>
                            <div class="col">
                                <button id="btn_3" onClick="muestra_oculto('contenido_3','contenido_1','contenido_2')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><img src="img/documentos.png" alt="" width="35px"><br><b>3. Notas</b>    
                                </button>
                            </div>

                        </div>
                        <br>

                            <!--SIGUE EL PHP DEL COMPRADOR-->
                            <?php 
    
                                echo "<script>";
                                echo "console.log('Hole ','$user')";
                                echo "</script>";

                                $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                $sqll = "SELECT * from persona_aux where nombres like '$user'";
                                $resultt = mysqli_query($bd_aux, $sqll);            
                                $mostrar=mysqli_fetch_array($resultt);  
                                $correo_fl = "".$mostrar['nombres'];

                                $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
                                $consul_notif= "select cont_mensajes from persona_comprador where nombres like '$correo_fl'";
                                $result_not = mysqli_query($bd, $consul_notif);
                                $mostrar_not=mysqli_fetch_array($result_not); 

                                $con_men_2 = "select pais,departamento,ciudad,direccion,telefono from persona_comprador where nombres like '$correo_fl'";
                                $result_men_2 = mysqli_query($bd,$con_men_2);
                                $mostrar_prop = mysqli_fetch_array($result_men_2);
                                                            
                                $con_men = "select mensajes from persona_comprador where nombres like '$correo_fl'";
                                $result_men = mysqli_query($bd,$con_men);
                                $mostrar_men = mysqli_fetch_array($result_men);
                                $mostrar_men_2 = "".$mostrar_men['mensajes'];

                                mysqli_close($bd);

                                $bd_prop = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas"); 
                                $sql_prop = "SELECT empresa, telefono, direccion from propuestas where correo like '$correo_fl'";
                                $resultt_prop = mysqli_query($bd_prop, $sql_prop);       
                                 
                                $sql_prop_5 = "SELECT correo, producto, cantidad, precio, comprador, ide from canceladas";
                                $resultt_prop_5 = mysqli_query($bd_prop, $sql_prop_5);  
                                        
                                $sql_cont_prop_5 = "select count('correo') from canceladas";
                                $resultt_cont_prop1_5 = mysqli_query($bd_prop, $sql_cont_prop_5);  
                                $mostrar1_5 = mysqli_fetch_assoc($resultt_cont_prop1_5);  
                                
                                $sqll1 = "SELECT correo, producto, cantidad, precio from inventario where comprador like '$correo_fl'";
                                $resultt1_6 = mysqli_query($bd_prop, $sqll1);         
                                
                                $sql_cont_prop = "select count('correo') from inventario where comprador like '$correo_fl'";
                                $resultt_cont_prop1_6 = mysqli_query($bd_prop, $sql_cont_prop);  
                                $resultt_cont_prop_6 = mysqli_fetch_assoc($resultt_cont_prop1_6);

                                mysqli_close($bd_prop);                    
                            ?>

                            <!--DE AQUI SIGUEN LOS CONTENIDOS OCULTOS-->
                        <div class="row">
                            <div id="contenido_1" class='col-12' role='alert' style="display:none;text-align:center;">
                                
                                <?php 
                                    echo "Sus datos son: <br/>";
                                    echo "Correo: ".$mostrar['nombres']."<br/>"; 
                                    echo "Clave: ".$mostrar['claves']."<br/>"; 
                                ?>
                                    <br>
                                    
                                    <table class="table table-success" style="text-align:center;">

                                        <thead class="thead-dark">
                                            <tr>
                                                <th>País</th>
                                                <th>Departamento</th>
                                                <th>Ciudad</th>
                                                <th>Dirección</th>
                                                <th>Teléfono</th>
                                            </tr>
                                        </thead>
                                        
                                            <tr >
                                                <td><?php echo $mostrar_prop['pais'] ?></td>
                                                <td><?php echo $mostrar_prop['departamento'] ?></td>
                                                <td><?php echo $mostrar_prop['ciudad'] ?></td>
                                                <td><?php echo $mostrar_prop['direccion'] ?></td>
                                                <td><?php echo $mostrar_prop['telefono'] ?></td>  
                                            </tr>    
                                        
                                    </table>

                                <br>
                                         
                            </div>

                            <div id="contenido_2" class='col-12' role='alert' style="display:none;">
                            
                                    <?php 

                                        $bd_propu = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas"); 
                                        $sql_camb = mysqli_set_charset($bd_propu, "utf8"); 
                                        $sql_prop_2 = "SELECT empresa, correo, producto, cantidad, precio, ide from propuestas";
                                        $resultt_prop_2 = mysqli_query($bd_propu, $sql_prop_2);

                                        $sql_cont_prop = "select count('correo') from propuestas";
                                        $resultt_cont_prop1 = mysqli_query($bd_propu, $sql_cont_prop);  
                                        $resultt_cont_prop = mysqli_fetch_assoc($resultt_cont_prop1);

                                        if($resultt_cont_prop["count('correo')"]>=1){
                                            ?>
                                            <table name="tabal" id="tabal" class="table table-success" style="text-align:center;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Empresa</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                </thead> 
                                            <?php

                                                while ($mostrar_prop = mysqli_fetch_array($resultt_prop_2)){?>
                                                                                        
                                                    <tr >
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
                                                        <td><?php echo $mostrar_prop['ide'] ?></td> 
                                                        <td><?php echo $mostrar_prop['empresa'] ?></td>
                                                        
                                                        <td><?php echo $product ?></td>
                                                        <td><?php echo $mostrar_prop['cantidad'] ?></td> 
                                                        <td><?php echo $mostrar_prop['precio'] ?></td>   
                                                        <td><label ><b>Disponible</b>        
                                                        </label></td> 
                                                        
                                                    </tr>    
                                                <?php } 
                                                mysqli_close($bd_propu);
                                                ?>
                                                </table>
                                                
                                                <form action="recibir_boton.php" class="form" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label style="color:white;">Propuesta</label>
                                                    <input style="border-color: blue; border-style: inset; border-radius: 10px;" type="number" 
                                                        name="txtIde" id="txtIde" placeholder="  # Código" required>
                                                    
                                                </div>
                                                <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $correo_fl; ?>">
                                                <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);width:50%">
                                                    <button class="button" type="submit" id="envia" style='cursor: pointer;'><b>Comprar</b></button>
                                                </div>
                                                </form>
                                                <?php
                                        }else{
                                            echo "<div class='alert alert-danger' role='alert'>"."No hay propuestas en oferta."."</div>";
                                        }
                                        ?>
                            </div>

                            <div id="contenido_3" class='col-12' role='alert' style="display:none;">
                                
                                <label for="formGroupExampleInput" class="form-label">Notas:</label>

                                <form name="form1" method="POST" action="ag_notas.php">
                                    
                                    <fieldset type="text" class="form-control" id="field" placeholder="Primero" style="border: 3px solid lightgray; border-radius: 5px;">
                                        <br>
                                        <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $correo_fl; ?>">
                                        <button style="background-color:yellow;box-shadow: 4px 4px rgb(12, 13, 97);width:90%;" type="button" value="Agregar" onclick="crear(this)">Agregar Nota</button><br><br> 
                                        <button style="background-color:yellow;box-shadow: 4px 4px rgb(12, 13, 97);width:90%;" name="save" type="submit" value="Guardar" >Guardar</button><br><br>
                                    </fieldset>
                                    
                                </form>

                                <br>

                                <?php
                                    $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                    $sqll1 = "SELECT notas from persona_comprador where nombres like '$correo_fl'";
                                    $resultt1 = mysqli_query($bd, $sqll1);            
                                    $mostrar1 = mysqli_fetch_array($resultt1);  
                                    $correo1 = "".$mostrar1['notas'];
                                    
                                    $i=0;
                                    $nota_2="";
                                    $r=0;
                                    
                                    if(strlen($correo1)==0){
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay aún notas registradas."."</div>";
                                    }
                                    else{
                                        while($i < strlen($correo1)){

                                            if($correo1[$i]!="" || $correo1[$i]!=NULL){

                                                if($correo1[$i]!="|"){
                                                    $nota_2 .= "".$correo1[$i];
                                               }
                                                else{
                                                    echo "<div class='alert alert-success' role='alert'>".$nota_2."</div>";
                                                    $nota_2="";
                                               }
                                                if($i==(strlen($correo1)-1))
                                                {
                                                    echo "<div class='alert alert-success' role='alert'>".$nota_2."</div><br>";
                                                    $nota_2="";
                                                }
                                            
                                            }
                                            $i++;
                                            
                                        }
                                    }
                                    
                                ?>
                            </div>
                                
                        </div>
                            
                        <div class="row" style="box-shadow: 4px 4px rgb(12, 13, 97);width:90%;">
                            <button class="button" type="submit" style='cursor: pointer;' OnClick="muestra_oculta('cont_noti')"><img src="img/notificacion.png" alt="" width="28px"><b><?php echo " ".$mostrar_not['cont_mensajes'] ?> Notificaciones</b></button>
                        </div>
                        <div id="cont_noti" style="display:none;width:95%;padding:10px;">
                            <div class='alert alert-success' role='alert' style="background-color:rgb(12, 13, 97);color:black;">
                                <?php
                                    $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                    $sqll1 = "SELECT mensajes from persona_comprador where nombres like '$correo_fl'";
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

                                <!--<?php 
                                    if($mostrar1_5["count('correo')"]>=1){
                                        echo "<label style='color:white;'>Consultar Compras Canceladas: </label><br/>";
                                        ?>
                                        
                                        <br>
                                        <table class="table table-success" style="text-align:center;">

                                            <thead class="thead-dark" >
                                                <tr>
                                                    <th>Vendedor</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Comprador</th>   
                                                </tr>
                                            </thead>
                                            <?php while ($mostrar_men = mysqli_fetch_array($resultt_prop_5)){?>
                                                <tr >
                                                    <td><?php echo $mostrar_men['correo'] ?></td>
                                                    <td><?php echo $mostrar_men['producto'] ?></td>
                                                    <td><?php echo $mostrar_men['cantidad'] ?></td>    
                                                    <td><?php echo $mostrar_men['precio'] ?></td> 
                                                    <td><?php echo $mostrar_men['comprador'] ?></td>        
                                                </tr>    
                                            <?php } ?>
                                        </table>

                                        <?php
                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay notificaciones."."</div>";
                                    }
                                ?>-->

                            </div>
                        </div>           
                        
        
                        <br>
                        <div class="row" style="box-shadow: 4px 4px rgb(12, 13, 97);width:90%;">
                            <button class="button" type="submit" style='cursor: pointer;' OnClick="muestra_oculta('cont_compras')"><img src="img/procesos.png" alt="" width="30px"><b><?php echo " ".$resultt_cont_prop_6["count('correo')"] ?>   Procesos vigentes / Compras</b></button>
                        </div>
                        <div id="cont_compras" style="display:none;width:95%;padding:10px;">
                            <div class='alert alert-success' role='alert' style="background-color:rgb(12, 13, 97);color:black;">

                                <?php 

                                    if($resultt_cont_prop_6["count('correo')"]>=1){
                                        ?>
                                        <table name="tabal" id="tabal" class="table table-success" style="text-align:center;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Vendedor</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead> 
                                        <?php

                                            while ($mostrar_prop = mysqli_fetch_array($resultt1_6)){?>
                                                                                    
                                                <tr >
                                                    <td><?php echo $mostrar_prop['correo'] ?></td> 
                                                    <td><?php echo $mostrar_prop['producto'] ?></td>
                                                    <td><?php echo $mostrar_prop['cantidad'] ?></td> 
                                                    <td><?php echo $mostrar_prop['precio'] ?></td>  
                                                    
                                                </tr>    
                                            <?php } 
                                            
                                            ?>
                                            </table>

                                            <?php
                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay compras registradas."."</div>";
                                    }
                                ?>

                            </div>

                        </div> 

                        <br><br>               
                    </div>

             </div>

        </div>
    
        <br><br> 
        <br><br><br>
        <br><br><br>
            
    </div>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>