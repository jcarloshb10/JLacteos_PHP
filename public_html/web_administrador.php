<?php
    sleep(5);
    $user = $_GET['user1'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Administrador</title>
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
                        <button class="button" onclick="<?php echo "location = 'web_administrador.php?user1=$user'"; ?>" style="color:black;width:100px;box-shadow: 3px 3px rgb(12, 13, 97);cursor:pointer;"><b>Recargar</b> </button>                                        
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

                <div class="col-8 order-last"  style="padding-top:20px;">
                    <div class="container" style="background-color: rgb(248, 243, 241);">
                        <div class="row" style="padding:10px;">       
                            <label>
                                <b>Panel de control: </b>Administrador
                                <!--<a align="right" style="position:right;cursor:pointer;" ><img src="img/ayuda.ico" alt="" title="El proveedor es quién provee los productos y ofrece sus propuestas a nuestra empresa." width="35px"></a>-->  
                                <abbr align="right" title="El proveedor es quién provee los productos y ofrece sus propuestas a nuestra empresa."><img src="img/ayuda.ico" alt="" width="25px"></abbr>
                            </label> 
                            <hr width="80%" color="yellow" style="border:solid 1px yellow;">
                            <a href="https://dashboard.reach.at/login?return=/"><img src="img/soporte2.jpg" alt="" width="50px" height="40px"> Revisar Correo</a>         
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <button id="btn_1" onClick="muestra_oculto('contenido_1','contenido_2','contenido_3')" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><img src="img/datos_basicos.png" alt="" width="35px"><br><b>1. Inventario</b>    
                                </button>
                            </div>
                            <div class="col">
                                <button id="btn_2" onClick="muestra_oculto('contenido_2','contenido_1','contenido_3')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><img src="img/experiencia.png" alt="" width="35px"><br><b>2. Proveedores</b>    
                                </button>
                            </div>
                            <div class="col">
                                <button id="btn_3" onClick="muestra_oculto('contenido_3','contenido_1','contenido_2')" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><img src="img/documentos.png" alt="" width="35px"><br><b>3. Estudio propuestas</b>    
                                </button>
                            </div>

                        </div>
                        <br>
                            <!--SIGUE EL PHP DEL ADMINISTRADOR-->
                            <?php 
                                
                                $bd_prop = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas"); 
                                $sql_prop = "SELECT correo, producto, cantidad, precio, comprador, ide from inventario";
                                $resultt_prop = mysqli_query($bd_prop, $sql_prop);  
                                        

                                $sql_cont_prop_0 = "select count('correo') from inventario";
                                $resultt_cont_prop1_0 = mysqli_query($bd_prop, $sql_cont_prop_0);  
                                $mostrar1_0 = mysqli_fetch_assoc($resultt_cont_prop1_0);

                                mysqli_close($bd_prop);        
                                
                                $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                $sqll1 = "SELECT nombres from persona";
                                $resultt1 = mysqli_query($bd, $sqll1);  
                                
                                $sql_cont_prop = "select count('nombres') from persona";
                                $resultt_cont_prop1 = mysqli_query($bd, $sql_cont_prop);  
                                $mostrar1 = mysqli_fetch_assoc($resultt_cont_prop1);

                                mysqli_close($bd);

                            ?>

                            <!--DE AQUI SIGUEN LOS CONTENIDOS OCULTOS-->
                        <div class="row">
                            <div id="contenido_1" class='col-12' role='alert' style="display:none;text-align:center;">
                                
                                <?php 
                                    

                                    if($mostrar1_0["count('correo')"]>=1){
                                        echo "Consultar inventario: <br/>";
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
                                                    <th>Código</th>
                                                </tr>
                                            </thead>
                                            <?php while ($mostrar_men = mysqli_fetch_array($resultt_prop)){?>
                                                <tr >
                                                    <td><?php echo $mostrar_men['correo'] ?></td>
                                                    <td><?php echo $mostrar_men['producto'] ?></td>
                                                    <td><?php echo $mostrar_men['cantidad'] ?></td>    
                                                    <td><?php echo $mostrar_men['precio'] ?></td> 
                                                    <td><?php echo $mostrar_men['comprador'] ?></td>
                                                    <td><?php echo $mostrar_men['ide'] ?></td> 
                                                </tr>    
                                            <?php } ?>
                                        </table>

                                        <form class="row justify-content-center" action="eliminar_compra.php" class="form" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label style="color:black;">Negociación a CANCELAR: </label>
                                                <input style="border-color: blue; border-style: inset; border-radius: 10px;" type="number" 
                                                    name="txtIden" id="txtIden" placeholder="  # Código" required>
                                                
                                            </div>
                                            <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $user; ?>">
                                            <div  style="box-shadow: 4px 4px rgb(12, 13, 97);width:50%">
                                                <button class="button" type="submit" id="envia" style='cursor: pointer;'><b>Eliminar</b></button>
                                            </div>
                                        </form>
                                        <?php
                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay negociaciones actualmente."."</div>";
                                    }
                                ?>
                                    
                                    

                                <br>
                                <!--<input type="text" placeholder="Pega aquí para probar" />-->           
                            </div>

                            <div id="contenido_2" class='col-12' role='alert' style="display:none;">
                                

                                <?php
                                    
                                    
                                    if($mostrar1["count('nombres')"]>=1){
                                        echo "PROVEEDORES: <br/>";
                                        ?>
                                        
                                        <br>
                                        <table class="table table-success" style="text-align:center;">

                                            <thead class="thead-dark">
                                                <tr>

                                                    <th>Correo</th>
                                                    <th>Propuestas</th>

                                                </tr>
                                            </thead>
                                            <?php while ($mostrar_men_9 = mysqli_fetch_array($resultt1)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $mostrar_men_9['nombres'] ?></td>
                                                    <?php
                                                        $cor = $mostrar_men_9['nombres'];

                                                        $bd_prop = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas"); 

                                                        $sql_cont = "select count('correo') from propuestas where correo like '$cor'";
                                                        $resultt_cont = mysqli_query($bd_prop, $sql_cont);  
                                                        $resultt_cont_0 = mysqli_fetch_assoc($resultt_cont);

                                                        mysqli_close($bd_prop);  
                                                    ?>
                                                    <td><?php echo $resultt_cont_0["count('correo')"] ?></td> 
                                                </tr>    
                                            <?php } ?>
                                        </table>
                                        <?php
                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay Proveedores registrados."."</div>";
                                    }

                                    
                                ?>
                                <!--<input type="text" placeholder="Pega aquí para probar" />-->           
                            </div>

                            <div id="contenido_3" class='col-12' role='alert' style="display:none;">

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
                                            <br>
                                            <form class="row justify-content-center" action="eliminar_propuesta.php" class="form" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label style="color:black;">Propuesta que se ELIMINARÁ: </label>
                                                    <input style="border-color: blue; border-style: inset; border-radius: 10px;" type="number" 
                                                        name="txtIde" id="txtIde" placeholder="  # Código" required>
                                                    
                                                </div>
                                                <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $user; ?>">
                                                <div class="form-group" style="box-shadow: 4px 4px rgb(12, 13, 97);width:50%">
                                                    <button class="button" type="submit" id="envia" style='cursor: pointer;'><b>Eliminar</b></button>
                                                </div>
                                            </form>
                                            <?php
                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>"."No hay propuestas/ofertas registradas."."</div>";
                                    }
                                ?>
                                              
                            </div>
                        </div>
 
                        <br><br>               
                    </div>
                </div>

        </div>
    
        <br>
        <br><br><br>
        <br><br><br>
        <br><br><br>      
    </div>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>